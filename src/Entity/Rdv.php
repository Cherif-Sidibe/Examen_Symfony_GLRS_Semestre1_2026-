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

    #[ORM\Column(type: 'string', enumType: SpecialiteEnum::class, nullable: true)]
    private ?SpecialiteEnum $specialite = null;

    #[ORM\Column (name: 'is_delete', options: ['default' => false])]
    private ?bool $isDelete = null;

    #[ORM\Column (name: 'create_at')]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column    (name: 'update_at', nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\ManyToOne(inversedBy: 'rdvs')]
    private ?Patient $patient = null;

    public function __construct()
    {
        $this->isDelete = false;
        $this->createAt = new \DateTimeImmutable();
        $this->updateAt = new \DateTimeImmutable();
    }

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

    public function getSpecialite(): ?SpecialiteEnum
    {
        return $this->specialite;
    }

    public function setSpecialite(?SpecialiteEnum $specialite): static
    {

        $this->specialite = $specialite;

        return $this;
    } 
    
    public function isIsDelete(): ?bool
    {
        return $this->isDelete;
    }
    public function setIsDelete(bool $isDelete): static
    {
        $this->isDelete = $isDelete;

        return $this;
    }
    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }
    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }
    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt; 
    }
    public function setUpdateAt(?\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

}
