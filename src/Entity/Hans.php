<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HansRepository")
 */
class Hans implements \Stringable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private int $hansId = 0;

    /**
     * @ORM\Column(type="string")
     */
    private string $title = '';

    /**
     * @ORM\Column(type="text")
     */
    private string $content = '';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="authors")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private ?Author $author = null;

    /**
     * @ORM\Column(type="array")
     */
    private array $kalliope = [];

    /**
     * @return int
     */
    public function getHansId(): ?int
    {
        return $this->hansId;
    }

    public function setHansId(int $hansId): self
    {
        $this->hansId = $hansId;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getKalliope(): ?array
    {
        return $this->kalliope;
    }

    public function setKalliope(array $kalliope): self
    {
        $this->kalliope = $kalliope;

        return $this;
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

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function __toString(): string
    {
        return $this->hansId.' '.$this->getTitle();
    }
}
