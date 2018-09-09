<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 09-Sep-18
 * Time: 03:40
 */

namespace App\Event;

use App\Entity\Biddings;
use App\Repository\BiddingsRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BidSubscriber implements EventSubscriberInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var BiddingsRepository
     */
    private $biddingsRepository;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(
        EntityManagerInterface $entityManager,
        ProductRepository $productRepository,
        BiddingsRepository $biddingsRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->entityManager = $entityManager;
        $this->productRepository = $productRepository;
        $this->biddingsRepository = $biddingsRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public static function getSubscribedEvents()
    {
        return [
            BidEvent::NAME => 'onBidRegister',
        ];
    }

    public function onBidRegister(BidEvent $event)
    {
        $bidEvent = $event->getBid();
        $productId = $bidEvent->getProductId();
        $userId = $bidEvent->getUserId();

        $bids = $this->biddingsRepository->findBidsWithoutCurrentUser($productId, $userId);
        /** @var Biddings $bid */
        foreach ($bids as $bid) {
            if ($bidEvent->getBid() > $bid->getBid()) {
                if ($bidEvent->getBid() < $bid->getMaxBid()) {
                } else {
                    $this->entityManager->remove($bid);
                    $this->entityManager->flush();
                }
            } else {
                $bid->setBid($bidEvent->getBid() + 1);
                $this->entityManager->flush();
                $newBidEvent = new BidEvent($bid);
                $this->eventDispatcher->dispatch(
                    BidEvent::NAME,
                    $newBidEvent
                );
            }
            //notify the old one
        }
        // a se cauta bid-urile pentru acelas produs si a se verifica daca au max bid
        // daca au max bid

    }
}