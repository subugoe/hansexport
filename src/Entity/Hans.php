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
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $hansId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    private $kalliope;

    /**
     * @return int
     */
    public function getHansId(): int
    {
        return $this->hansId;
    }

    /**
     * @param int $hansId
     *
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
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
    public function getKalliope(): array
    {
        return $this->kalliope;
    }

    /**
     * @param array $kalliope
     *
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Hans
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
