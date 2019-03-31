<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NavigationRepository")
 */
class Navigation
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
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Navigation", inversedBy="navigations")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Navigation", mappedBy="parent")
     */
    private $navigations;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Page", mappedBy="navigation", cascade={"persist", "remove"})
     */
    private $page;

    public function __construct()
    {
        $this->navigations = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getNavigations(): Collection
    {
        return $this->navigations;
    }

    public function addNavigation(self $navigation): self
    {
        if (!$this->navigations->contains($navigation)) {
            $this->navigations[] = $navigation;
            $navigation->setParent($this);
        }

        return $this;
    }

    public function removeNavigation(self $navigation): self
    {
        if ($this->navigations->contains($navigation)) {
            $this->navigations->removeElement($navigation);
            // set the owning side to null (unless already changed)
            if ($navigation->getParent() === $this) {
                $navigation->setParent(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(Page $page): self
    {
        $this->page = $page;

        // set the owning side of the relation if necessary
        if ($this !== $page->getNavigation()) {
            $page->setNavigation($this);
        }

        return $this;
    }
}
