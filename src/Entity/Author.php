<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
    (strategy="AUTO")
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
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

    /**
     * @return \DateTimeInterface
     */
    public function getBorn(): ?\DateTimeInterface
    {
        return $this->born;
    }

    public function setBorn(\DateTime $born): Author
    {
        $this->born = $born;

        return $this;
    }

    /**
     * @return Hans
     */
    public function getHans()
    {
        return $this->hans;
    }

    public function setHans(Collection $hans): Author
    {
        $this->hans = $hans;

        return $this;
    }

    public function __toString()
    {
        return $this->author;
    }
}
