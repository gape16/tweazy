<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElementTypeRepository")
 */
class ElementType
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
     * @ORM\OneToMany(targetEntity="App\Entity\FormElement", mappedBy="ElementType")
     */
    private $formElements;

    public function __construct()
    {
        $this->formElements = new ArrayCollection();
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
     * @return Collection|FormElement[]
     */
    public function getFormElements(): Collection
    {
        return $this->formElements;
    }

    public function addFormElement(FormElement $formElement): self
    {
        if (!$this->formElements->contains($formElement)) {
            $this->formElements[] = $formElement;
            $formElement->setElementType($this);
        }

        return $this;
    }

    public function removeFormElement(FormElement $formElement): self
    {
        if ($this->formElements->contains($formElement)) {
            $this->formElements->removeElement($formElement);
            // set the owning side to null (unless already changed)
            if ($formElement->getElementType() === $this) {
                $formElement->setElementType(null);
            }
        }

        return $this;
    }
}
