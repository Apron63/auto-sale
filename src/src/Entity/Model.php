<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelRepository::class)]
class Model
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Brand::class, inversedBy: 'models')]
    #[ORM\JoinColumn(nullable: false)]
    private $brand;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'float')]
    private $engineCapacity;

    #[ORM\Column(type: 'integer')]
    private $enginePower;

    #[ORM\Column(type: 'string', length: 255)]
    private $gearboxType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEngineCapacity(): ?float
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(float $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    public function getEnginePower(): ?int
    {
        return $this->enginePower;
    }

    public function setEnginePower(int $enginePower): self
    {
        $this->enginePower = $enginePower;

        return $this;
    }

    public function getGearboxType(): ?string
    {
        return $this->gearboxType;
    }

    public function setGearboxType(string $gearboxType): self
    {
        $this->gearboxType = $gearboxType;

        return $this;
    }
}
