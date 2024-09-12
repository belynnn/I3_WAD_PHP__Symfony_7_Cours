<?php

namespace App\Entity;

use App\Repository\AeroportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AeroportRepository::class)]
class Aeroport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 5)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateMiseEnService = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heureMiseEnService = null;



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
    public function __construct(array $init = [])
    {
        $this->hydrate($init);
    }
    // CONSTRUCTOR HYDRATE
        // CONSTRUCTOR HYDRATE
            // CONSTRUCTOR HYDRATE



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

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

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(?\DateTimeInterface $dateMiseEnService): static
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getHeureMiseEnService(): ?\DateTimeInterface
    {
        return $this->heureMiseEnService;
    }

    public function setHeureMiseEnService(?\DateTimeInterface $heureMiseEnService): static
    {
        $this->heureMiseEnService = $heureMiseEnService;

        return $this;
    }
}
