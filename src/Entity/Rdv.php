<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RdvRepository::class)]
class Rdv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateAt = null;

    #[ORM\Column(type: 'string', enumType: TypeEnum::class)]
    private ?TypeEnum $type = null;

    #[ORM\Column(type: 'string', enumType: EtatEnum::class)]
    private ?EtatEnum $etat = EtatEnum::EN_ATTENTE;

    #[ORM\ManyToOne(targetEntity: Patient::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    #[ORM\Column(type: 'string', enumType: SpecialiteEnum::class, nullable: true)]
    private ?SpecialiteEnum $specialite = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAt(): ?\DateTimeImmutable
    {
        return $this->dateAt;
    }

    public function setDateAt(\DateTimeImmutable $dateAt): static
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    public function getType(): ?TypeEnum
    {
        return $this->type;
    }

    public function setType(TypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?EtatEnum
    {
        return $this->etat;
    }

    public function setEtat(EtatEnum $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getSpecialite(): ?SpecialiteEnum
    {
        return $this->specialite;
    }

    public function setSpecialite(?SpecialiteEnum $specialite): static
    {

        $this->specialite = $specialite;

        return $this;
    } 
}
