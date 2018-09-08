<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiddingsRepository")
 */
class Biddings
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
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     * @return integer
     */

    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $bid;

    /**
     * @return integer
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $max_bid;

    /**
     * @return integer
     */
    public function getMaxBid()
    {
        return $this->max_bid;
    }

}
