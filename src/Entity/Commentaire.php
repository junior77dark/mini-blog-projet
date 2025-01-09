<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_com = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionCom(): ?string
    {
        return $this->description_com;
    }

    public function setDescriptionCom(?string $description_com): static
    {
        $this->description_com = $description_com;

        return $this;
    }
}
