<?php

namespace App\Entity;

use App\Repository\CategoryDeliveryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryDeliveryRepository::class)
 */
class CategoryDelivery
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Delivery::class, mappedBy="categoryDelivery")
     */
    private $delivery;

    public function __construct()
    {
        $this->delivery = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Delivery[]
     */
    public function getDelivery(): Collection
    {
        return $this->delivery;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->delivery->contains($delivery)) {
            $this->delivery[] = $delivery;
            $delivery->setCategoryDelivery($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->delivery->contains($delivery)) {
            $this->delivery->removeElement($delivery);
            // set the owning side to null (unless already changed)
            if ($delivery->getCategoryDelivery() === $this) {
                $delivery->setCategoryDelivery(null);
            }
        }

        return $this;
    }
}
