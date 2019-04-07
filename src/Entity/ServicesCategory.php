<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesCategoryRepository")
 */
class ServicesCategory
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
     * @ORM\OneToMany(targetEntity="App\Entity\ServicesSousCategory", mappedBy="Category")
     */
    private $servicesSousCategories;

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
        $this->servicesSousCategories = new ArrayCollection();
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

    /**
     * @return Collection|ServicesSousCategory[]
     */
    public function getServicesSousCategories(): Collection
    {
        return $this->servicesSousCategories;
    }

    public function addServicesSousCategory(ServicesSousCategory $servicesSousCategory): self
    {
        if (!$this->servicesSousCategories->contains($servicesSousCategory)) {
            $this->servicesSousCategories[] = $servicesSousCategory;
            $servicesSousCategory->setCategory($this);
        }

        return $this;
    }

    public function removeServicesSousCategory(ServicesSousCategory $servicesSousCategory): self
    {
        if ($this->servicesSousCategories->contains($servicesSousCategory)) {
            $this->servicesSousCategories->removeElement($servicesSousCategory);
            // set the owning side to null (unless already changed)
            if ($servicesSousCategory->getCategory() === $this) {
                $servicesSousCategory->setCategory(null);
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
