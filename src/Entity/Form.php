<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormRepository")
 */
class Form
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServicesList", inversedBy="forms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ServicesList;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FormElement", mappedBy="Form")
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

    public function getServicesList(): ?ServicesList
    {
        return $this->ServicesList;
    }

    public function setServicesList(?ServicesList $ServicesList): self
    {
        $this->ServicesList = $ServicesList;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

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
            $formElement->setForm($this);
        }

        return $this;
    }

    public function removeFormElement(FormElement $formElement): self
    {
        if ($this->formElements->contains($formElement)) {
            $this->formElements->removeElement($formElement);
            // set the owning side to null (unless already changed)
            if ($formElement->getForm() === $this) {
                $formElement->setForm(null);
            }
        }

        return $this;
    }
}
