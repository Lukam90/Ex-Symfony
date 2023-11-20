<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/** 
 * A manufacturer 
 * 
 * @ORM\Entity
 */
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Patch(),
        new Put(),
    ],
    paginationItemsPerPage: 5
)]
class Manufacturer
{
    /** 
     * The manufacturer's id 
     * 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /** 
     * The manufacturer's name 
     * 
     * @ORM\Column
     */
    #[
        Assert\NotBlank,
        Groups(["product.read"])
    ]
    private string $name = "";

    /** 
     * The manufacturer's description 
     * 
     * @ORM\Column(type="text")
     */
    #[Assert\NotBlank]
    private string $description = "";

    /** 
     * The manufacturer's country code 
     * 
     * @ORM\Column(length=3)
     */
    #[Assert\NotBlank]
    private string $countryCode = "";

    /** 
     * The date that the manufacturer was listed 
     * 
     * @ORM\Column(type="datetime")
     */
    #[Assert\NotNull]
    private ?\DateTimeInterface $listedDate = null;

    /**
     * @var Product[] Available products from this manufacturer
     * 
     * @ORM\OneToMany(
     *      targetEntity="Product", 
     *      mappedBy="manufacturer",
     *      cascade={"persist", "remove"}
     * )
     */
    private iterable $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $name
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $name
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getListedDate(): ?\DateTimeInterface
    {
        return $this->listedDate;
    }

    /**
     * @param string $name
     */
    public function setListedDate(?\DateTimeInterface $listedDate): void
    {
        $this->listedDate = $listedDate;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): iterable|ArrayCollection
    {
        return $this->products;
    }
}