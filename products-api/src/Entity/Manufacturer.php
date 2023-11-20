<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;

use Doctrine\ORM\Mapping as ORM;

/** 
 * A manufacturer 
 * 
 * @ORM\Entity
 */
#[ApiResource]
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
    private string $name = "";

    /** 
     * The manufacturer's description 
     * 
     * @ORM\Column(type="text")
     */
    private string $description = "";

    /** 
     * The manufacturer's country code 
     * 
     * @ORM\Column(length=3)
     */
    private string $countryCode = "";

    /** 
     * The date that the manufacturer was listed 
     * 
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $listedDate = null;

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
}