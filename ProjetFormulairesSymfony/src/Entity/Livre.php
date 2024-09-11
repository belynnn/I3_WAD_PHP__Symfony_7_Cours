<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $isbn = null;

    /**
     * @var Collection<int, Exemplaire>
     */
    #[ORM\OneToMany(targetEntity: Exemplaire::class, mappedBy: 'livre', orphanRemoval: true)]
    private Collection $exemplaires;

    /**
     * @var Collection<int, Auteur>
     */
    #[ORM\ManyToMany(targetEntity: Auteur::class, inversedBy: 'livres')]
    private Collection $auteurs;



            // CONSTRUCTOR HYDRATE
        // CONSTRUCTOR HYDRATE
    // CONSTRUCTOR HYDRATE
    // HYDRATE
    public function hydrate(array $init)
    {
        foreach ($init as $propriete => $valeur) {
            $nomSet = "set" . ucfirst($propriete);
            if (!method_exists($this, $nomSet)) {
                // à nous de voir selon le niveau de restriction...
                // throw new Exception("La méthode {$nomSet} n'existe pas");
            }
            else {
                // appel au set
                $this->$nomSet($valeur);
            }
        }
    }

    // CONSTRUCTOR
    public function __construct(array $init)
    {
        $this->hydrate($init);

        // côté 1 des relations
        $this->exemplaires = new ArrayCollection();
        $this->auteurs = new ArrayCollection();
    }
    // CONSTRUCTOR HYDRATE
        // CONSTRUCTOR HYDRATE
            // CONSTRUCTOR HYDRATE



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(?\DateTimeInterface $datePublication): static
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return Collection<int, Exemplaire>
     */
    public function getExemplaires(): Collection
    {
        return $this->exemplaires;
    }

    public function addExemplaire(Exemplaire $exemplaire): static
    {
        if (!$this->exemplaires->contains($exemplaire)) {
            $this->exemplaires->add($exemplaire);
            $exemplaire->setLivre($this);
        }

        return $this;
    }

    public function removeExemplaire(Exemplaire $exemplaire): static
    {
        if ($this->exemplaires->removeElement($exemplaire)) {
            // set the owning side to null (unless already changed)
            if ($exemplaire->getLivre() === $this) {
                $exemplaire->setLivre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Auteur>
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): static
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs->add($auteur);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): static
    {
        $this->auteurs->removeElement($auteur);

        return $this;
    }

    
}
