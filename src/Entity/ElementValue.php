<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElementValueRepository")
 */
class ElementValue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FormElement", inversedBy="elementValues")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FormElement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormElement(): ?FormElement
    {
        return $this->FormElement;
    }

    public function setFormElement(?FormElement $FormElement): self
    {
        $this->FormElement = $FormElement;

        return $this;
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

    public function getValue(): ?string
    {
        return $this->Value;
    }

    public function setValue(string $Value): self
    {
        $this->Value = $Value;

        return $this;
    }
}
