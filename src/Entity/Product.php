<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $img;

    /**
     * @return string
     *
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @ORM\Column(type="mixed")
     */
    private $entry_date;

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entry_date;
    }

}
