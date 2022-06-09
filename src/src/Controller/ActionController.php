<?php

namespace App\Controller;

use App\Service\DocumentService;
use App\Service\GenerateDOCXService;
use App\Service\GeneratePDFService;
use App\Service\GenerateXLSService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends AbstractController
{
    private DocumentService $documentService;
    private GeneratePDFService $generatePDFService;
    private GenerateXLSService $generateXLSService;
    private GenerateDOCXService $generateDOCXService;

    public function __construct(
        DocumentService $documentService,
        GeneratePDFService $generatePDFService,
        GenerateXLSService $generateXLSService,
        GenerateDOCXService $generateDOCXService
    ) {
        $this->documentService = $documentService;
        $this->generatePDFService = $generatePDFService;
        $this->generateXLSService = $generateXLSService;
        $this->generateDOCXService = $generateDOCXService;
    }

    /**
     * @Route("/action", name="action")
     * @param Request $request
     * @return Response
     */
    public function action(Request $request): Response
    {
        $docType = $request->get('doc', '');
        $action = $request->get('action', '');
        $data = $this->documentService->prepareDocument($docType);
        $target = getcwd() . '/report/' . uniqid();

        switch ($docType) {
            case 'PDF':
                $target .= '.pdf';
                $contentType = 'application/pdf';
                $this->generatePDFService->generate($data, $target);
                break;
            case 'XLS':
                $target .= '.xls';
                $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                $this->generateXLSService->generate($data, $target);
                break;
            case 'DOCX':
                $target .= '.docx';
                $contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                $this->generateDOCXService->generate($data, $target);
                break;
        }

        switch($action) {
            case 'Save':
                return new Response ($target);
            case 'Email':
                $this->documentService->sendEmail($target);
                return new Response ('Email send');
            case 'Stream':
                $response = new StreamedResponse();
                $response->setCallback(function () use ($target) {
                    echo file_get_contents($target);
                });
                $response->headers->set('Content-Type', $contentType);
                $response->send();
        }

        return new Response('');
    }
}