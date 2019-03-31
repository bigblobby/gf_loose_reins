<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
{
    use TimestampableEntity;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Navigation", inversedBy="page", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $navigation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Panel", mappedBy="page")
     * @ORM\OrderBy({"weight" = "ASC"})
     */
    private $panels;

    public function __construct()
    {
        $this->panels = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getNavigation(): ?Navigation
    {
        return $this->navigation;
    }

    public function setNavigation(Navigation $navigation): self
    {
        $this->navigation = $navigation;

        return $this;
    }

    /**
     * @return Collection|Panel[]
     */
    public function getPanels(): Collection
    {
        return $this->panels;
    }

    public function addPanel(Panel $panel): self
    {
        if (!$this->panels->contains($panel)) {
            $this->panels[] = $panel;
            $panel->setPage($this);
        }

        return $this;
    }

    public function removePanel(Panel $panel): self
    {
        if ($this->panels->contains($panel)) {
            $this->panels->removeElement($panel);
            // set the owning side to null (unless already changed)
            if ($panel->getPage() === $this) {
                $panel->setPage(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

}
