<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HansRepository")
 */
class Hans
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

    /**
     * @return Hans
     */
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

    /**
     * @return Hans
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return array
     */
    public function getKalliope(): ?array
    {
        return $this->kalliope;
    }

    /**
     * @return Hans
     */
    public function setKalliope(array $kalliope): self
    {
        $this->kalliope = $kalliope;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return Hans
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Hans
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     *
     * @return Hans
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function __toString()
    {
        return $this->hansId.' '.$this->getTitle();
    }
}
