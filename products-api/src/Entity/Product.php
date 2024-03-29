<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/** 
 * A product 
 * 
 * @ORM\Entity
 */
#[
    ApiResource(
        normalizationContext: ["groups" => ["product.read"]],
        denormalizationContext: ["groups" => ["product.write"]]
    ),
    ApiFilter(
        SearchFilter::class,
        properties: [
            "name" => SearchFilter::STRATEGY_PARTIAL,
            "description" => SearchFilter::STRATEGY_PARTIAL,
            "manufacturer.countryCode" => SearchFilter::STRATEGY_EXACT,
        ]
    ),
    ApiFilter(
        OrderFilter::class,
        properties: ["issueDate"]
    )
]
class Product
{
    /**
     * The product's id
     * 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * The product's MPN (Manufacturer Part Number)
     * 
     * @ORM\Column
     */
    #[
        Assert\NotNull,
        Groups(["product.read", "product.write"])
    ]
    private ?string $mpn = null;

    /**
     * The product's name
     * 
     * @ORM\Column
     */
    #[
        Assert\NotBlank,
        Groups(["product.read", "product.write"])
    ]
    private string $name = "";

    /**
     * The product's description
     * 
     * @ORM\Column(type="text")
     */
    #[
        Assert\NotBlank,
        Groups(["product.read", "product.write"])
    ]
    private string $description = "";

    /**
     * The product's date of issue
     * 
     * @ORM\Column(type="datetime")
     */
    #[
        Assert\NotNull,
        Groups(["product.read"])
    ]
    private ?\DateTimeInterface $issueDate = null;

    /**
     * The product's manufacturer
     * 
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     */
    #[Groups(["product.read"])]
    private ?Manufacturer $manufacturer = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    /**
     * @param string|null $mpn
     */
    public function setMpn(?string $mpn): void
    {
        $this->mpn = $mpn;
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
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     */
    public function setIssueDate(?\DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @return Manufacturer|null
     */
    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer|null $manufacturer
     */
    public function setManufacturer(?Manufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
}