<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesSousCategoryRepository")
 */
class ServicesSousCategory
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
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServicesCategory", inversedBy="servicesSousCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServicesList", mappedBy="SousCategory")
     */
    private $servicesLists;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    public function __construct()
    {
        $this->servicesLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCategory(): ?ServicesCategory
    {
        return $this->Category;
    }

    public function setCategory(?ServicesCategory $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * @return Collection|ServicesList[]
     */
    public function getServicesLists(): Collection
    {
        return $this->servicesLists;
    }

    public function addServicesList(ServicesList $servicesList): self
    {
        if (!$this->servicesLists->contains($servicesList)) {
            $this->servicesLists[] = $servicesList;
            $servicesList->setSousCategory($this);
        }

        return $this;
    }

    public function removeServicesList(ServicesList $servicesList): self
    {
        if ($this->servicesLists->contains($servicesList)) {
            $this->servicesLists->removeElement($servicesList);
            // set the owning side to null (unless already changed)
            if ($servicesList->getSousCategory() === $this) {
                $servicesList->setSousCategory(null);
            }
        }

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}
