<?php

namespace App\Entity;

use App\Repository\SymfonyConsoleMakeUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymfonyConsoleMakeUserRepository::class)]
class SymfonyConsoleMakeUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?string
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(string $Utilisateur): static
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }
}
