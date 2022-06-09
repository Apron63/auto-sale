<?php

namespace App\Service;

use App\Repository\JournelRepository;

class DocumentService
{
    private JournelRepository $journelRepository;

    public function __construct(JournelRepository $journelRepository)
    {
        $this->journelRepository = $journelRepository;
    }

    /**
     * @param string $docType
     * @return array
     */
    public function prepareDocument(string $docType): array
    {
        $data = [];

        foreach ($this->journelRepository->findAll() as $row) {
            $data[] = [
                'brand' => $row->getModel()->getBrand()->getName(),
                'model' => $row->getModel()->getName(),
                'vin' => $row->getVin(),
                'engineCapacity' => $row->getModel()->getEngineCapacity(),
                'enginePower' => $row->getModel()->getEnginePower(),
                'gearboxType' => $row->getModel()->getGearboxType(),
                'released' => $row->getReleased(),
                'date' => $row->getDate()->format('d.m.Y'),
                'dealer' => $row->getDealer(),
            ];
        }

        return $data;
    }

    public function sendEmail(string $fileName)
    {

    }
}