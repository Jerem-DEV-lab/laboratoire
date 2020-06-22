<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryRepository::class)
 */
class Delivery
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meeting;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $checkinTime;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $datedelivery;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryDelivery::class, inversedBy="delivery")
     */
    private $categoryDelivery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getMeeting(): ?string
    {
        return $this->meeting;
    }

    public function setMeeting(string $meeting): self
    {
        $this->meeting = $meeting;

        return $this;
    }

    public function getCheckinTime(): ?\DateTimeImmutable
    {
        return $this->checkinTime;
    }

    public function setCheckinTime(\DateTimeImmutable $checkinTime): self
    {
        $this->checkinTime = $checkinTime;

        return $this;
    }

    public function getDatedelivery(): ?\DateTimeImmutable
    {
        return $this->datedelivery;
    }

    public function setDatedelivery(\DateTimeImmutable $datedelivery): self
    {
        $this->datedelivery = $datedelivery;

        return $this;
    }

    public function getCategoryDelivery(): ?CategoryDelivery
    {
        return $this->categoryDelivery;
    }

    public function setCategoryDelivery(?CategoryDelivery $categoryDelivery): self
    {
        $this->categoryDelivery = $categoryDelivery;

        return $this;
    }
}
