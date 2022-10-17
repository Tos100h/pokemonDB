<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numPokedex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameFr;

    /**
     * @ORM\ManyToOne(targetEntity=Types::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type1;

    /**
     * @ORM\ManyToOne(targetEntity=Types::class)
     */
    private $type2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statHp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatAtk;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatDef;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatSpa;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatSpd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $BST;

    /**
     * @ORM\Column(type="integer")
     */
    private $Generation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFinalEvol;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $catchRate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLegendary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $isForm;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPokedex(): ?int
    {
        return $this->numPokedex;
    }

    public function setNumPokedex(int $numPokedex): self
    {
        $this->numPokedex = $numPokedex;

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

    public function getNameFr(): ?string
    {
        return $this->nameFr;
    }

    public function setNameFr(?string $nameFr): self
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    public function getType1(): ?Types
    {
        return $this->type1;
    }

    public function setType1(?Types $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?Types
    {
        return $this->type2;
    }

    public function setType2(?Types $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getStatHp(): ?int
    {
        return $this->statHp;
    }

    public function setStatHp(?int $statHp): self
    {
        $this->statHp = $statHp;

        return $this;
    }

    public function getStatAtk(): ?int
    {
        return $this->StatAtk;
    }

    public function setStatAtk(?int $StatAtk): self
    {
        $this->StatAtk = $StatAtk;

        return $this;
    }

    public function getStatDef(): ?int
    {
        return $this->StatDef;
    }

    public function setStatDef(?int $StatDef): self
    {
        $this->StatDef = $StatDef;

        return $this;
    }

    public function getStatSpa(): ?int
    {
        return $this->StatSpa;
    }

    public function setStatSpa(?int $StatSpa): self
    {
        $this->StatSpa = $StatSpa;

        return $this;
    }

    public function getStatSpd(): ?int
    {
        return $this->StatSpd;
    }

    public function setStatSpd(?int $StatSpd): self
    {
        $this->StatSpd = $StatSpd;

        return $this;
    }

    public function getStatSpeed(): ?int
    {
        return $this->StatSpeed;
    }

    public function setStatSpeed(?int $StatSpeed): self
    {
        $this->StatSpeed = $StatSpeed;

        return $this;
    }

    public function getBST(): ?int
    {
        return $this->BST;
    }

    public function setBST(?int $BST): self
    {
        $this->BST = $BST;

        return $this;
    }

    public function getGeneration(): ?int
    {
        return $this->Generation;
    }

    public function setGeneration(int $Generation): self
    {
        $this->Generation = $Generation;

        return $this;
    }

    public function isIsFinalEvol(): ?bool
    {
        return $this->isFinalEvol;
    }

    public function setIsFinalEvol(bool $isFinalEvol): self
    {
        $this->isFinalEvol = $isFinalEvol;

        return $this;
    }

    public function getCatchRate(): ?int
    {
        return $this->catchRate;
    }

    public function setCatchRate(?int $catchRate): self
    {
        $this->catchRate = $catchRate;

        return $this;
    }

    public function isIsLegendary(): ?bool
    {
        return $this->isLegendary;
    }

    public function setIsLegendary(bool $isLegendary): self
    {
        $this->isLegendary = $isLegendary;

        return $this;
    }

    public function getIsForm(): ?string
    {
        return $this->isForm;
    }

    public function setIsForm(?string $isForm): self
    {
        $this->isForm = $isForm;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
