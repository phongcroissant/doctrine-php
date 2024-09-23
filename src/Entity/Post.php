<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name:"posts")]
class Post
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id_post", type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name: "titre_post", type: "string", length: 200, nullable: false)]
    private string $titre;
    #[ORM\Column(name: "contenu_post", type: "text", nullable: false)]
    private string $contenu;
    #[ORM\Column(name: "date_creation_post", type: "datetime", nullable: false)]
    private \DateTime $createdDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTime $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

}