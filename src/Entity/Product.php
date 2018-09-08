<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $img;
    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $entry_date;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return string
     *
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $entry_date
     */
    public function setEntryDate($entry_date): void
    {
        $this->entry_date = $entry_date;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entry_date;
    }

}
