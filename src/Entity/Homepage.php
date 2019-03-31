<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomepageRepository")
 */
class Homepage
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
     * @ORM\Column(type="text")
     */
    private $headerContent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $boxOneContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boxOneImage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $boxTwoContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boxTwoImage;

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

    public function getHeaderContent(): ?string
    {
        return $this->headerContent;
    }

    public function setHeaderContent(string $headerContent): self
    {
        $this->headerContent = $headerContent;

        return $this;
    }

    public function getBoxOneContent(): ?string
    {
        return $this->boxOneContent;
    }

    public function setBoxOneContent(?string $boxOneContent): self
    {
        $this->boxOneContent = $boxOneContent;

        return $this;
    }

    public function getBoxOneImage(): ?string
    {
        return $this->boxOneImage;
    }

    public function setBoxOneImage(?string $boxOneImage): self
    {
        $this->boxOneImage = $boxOneImage;

        return $this;
    }

    public function getBoxTwoContent(): ?string
    {
        return $this->boxTwoContent;
    }

    public function setBoxTwoContent(?string $boxTwoContent): self
    {
        $this->boxTwoContent = $boxTwoContent;

        return $this;
    }

    public function getBoxTwoImage(): ?string
    {
        return $this->boxTwoImage;
    }

    public function setBoxTwoImage(?string $boxTwoImage): self
    {
        $this->boxTwoImage = $boxTwoImage;

        return $this;
    }

}
