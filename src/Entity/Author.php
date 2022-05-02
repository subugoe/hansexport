<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author implements \Stringable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id = 0;

    /**
     * @ORM\Column(type="string")
     */
    private string $author = '';

    /**
     * @var Hans
     * @ORM\OneToMany(targetEntity="App\Entity\Hans", mappedBy="author")
     */
    private $hans;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Author
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $born = null;

    public function getBorn(): ?\DateTimeInterface
    {
        return $this->born;
    }

    public function setBorn(\DateTime|\DateTimeImmutable $born): Author
    {
        $this->born = $born;

        return $this;
    }

    public function getHans(): Hans
    {
        return $this->hans;
    }

    public function setHans(Collection $hans): Author
    {
        $this->hans = $hans;

        return $this;
    }

    public function __toString(): string
    {
        return $this->author;
    }
}
