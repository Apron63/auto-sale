<?php

namespace App\Entity;

use App\Repository\JournelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JournelRepository::class)]
class Journel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Model::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $model;

    #[ORM\Column(type: 'string', length: 255)]
    private $vin;

    #[ORM\Column(type: 'integer')]
    private $released;

    #[ORM\Column(type: 'string', length: 255)]
    private $dealer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getReleased(): ?int
    {
        return $this->released;
    }

    public function setReleased(int $released): self
    {
        $this->released = $released;

        return $this;
    }

    public function getDealer(): ?string
    {
        return $this->dealer;
    }

    public function setDealer(string $dealer): self
    {
        $this->dealer = $dealer;

        return $this;
    }
}
