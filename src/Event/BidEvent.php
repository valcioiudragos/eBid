<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 09-Sep-18
 * Time: 03:32
 */

namespace App\Event;


use App\Entity\Biddings;
use Symfony\Component\EventDispatcher\Event;

class BidEvent extends Event
{
    const NAME = 'bid';

    private $bid;

    public function __construct(Biddings $bid)
    {
        $this->bid = $bid;
    }

    public function getBid()
    {
        return $this->bid;
    }
}