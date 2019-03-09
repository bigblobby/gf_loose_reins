<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $preview;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $previewImage;

    /**
     * @ORM\Column(type="json")
     */
    private $panels = [];

    /**
     * @ORM\ManyToOne(targetEntity="MainPage", inversedBy="pages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mainPage;

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

    public function getPreview(): ?string
    {
        return $this->preview;
    }

    public function setPreview(string $preview): self
    {
        $this->preview = $preview;

        return $this;
    }

    public function getPreviewImage(): ?string
    {
        return $this->previewImage;
    }

    public function setPreviewImage(string $previewImage): self
    {
        $this->previewImage = $previewImage;

        return $this;
    }

    public function getPanels(): ?array
    {
        return $this->panels;
    }

    public function setPanels(array $panels): self
    {
        $this->panels = $panels;

        return $this;
    }

    public function getMainPage(): ?MainPage
    {
        return $this->mainPage;
    }

    public function setMainPage(?MainPage $mainPage): self
    {
        $this->mainPage = $mainPage;

        return $this;
    }

}
