<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormElementRepository")
 */
class FormElement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Form", inversedBy="formElements")
     */
    private $Form;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ElementType", inversedBy="formElements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ElementType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Caption;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ElementValue", mappedBy="FormElement")
     */
    private $elementValues;

    public function __construct()
    {
        $this->elementValues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForm(): ?Form
    {
        return $this->Form;
    }

    public function setForm(?Form $Form): self
    {
        $this->Form = $Form;

        return $this;
    }

    public function getElementType(): ?ElementType
    {
        return $this->ElementType;
    }

    public function setElementType(?ElementType $ElementType): self
    {
        $this->ElementType = $ElementType;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->Caption;
    }

    public function setCaption(string $Caption): self
    {
        $this->Caption = $Caption;

        return $this;
    }

    /**
     * @return Collection|ElementValue[]
     */
    public function getElementValues(): Collection
    {
        return $this->elementValues;
    }

    public function addElementValue(ElementValue $elementValue): self
    {
        if (!$this->elementValues->contains($elementValue)) {
            $this->elementValues[] = $elementValue;
            $elementValue->setFormElement($this);
        }

        return $this;
    }

    public function removeElementValue(ElementValue $elementValue): self
    {
        if ($this->elementValues->contains($elementValue)) {
            $this->elementValues->removeElement($elementValue);
            // set the owning side to null (unless already changed)
            if ($elementValue->getFormElement() === $this) {
                $elementValue->setFormElement(null);
            }
        }

        return $this;
    }
}
