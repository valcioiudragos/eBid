<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 08-Sep-18
 * Time: 18:02
 */

namespace App\Controller;


use App\Entity\Biddings;
use App\Entity\Product;
use App\Entity\User;
use App\Event\BidEvent;
use App\Repository\BiddingsRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class ProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var BiddingsRepository
     */
    private $biddingsRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    public function __construct(
        ProductRepository $productRepository,
        BiddingsRepository $biddingsRepository,
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory
    ) {
        $this->productRepository = $productRepository;
        $this->biddingsRepository = $biddingsRepository;
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/product/{id}", name="product_list")
     */
    public function product(Product $product, AuthenticationUtils $authenticationUtils)
    {

        return $this->render('product/product.html.twig',
        [
            'product' => $product,
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]

        );
    }

    /**
     * @Route("/product/bid/{id}", name="product_bid")
     * @Security("is_granted('ROLE_USER')")
     */
    public function bidProduct(Product $product, Request $request, EventDispatcherInterface $eventDispatcher)
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();

        $bidding = new Biddings();
        $bidding->setUserId($currentUser->getId());
        $bidding->setProductId($product->getId());
        if($request->get('bid') == NULL)
        {
            return $this->redirectToRoute('product_list', ['id' => $product->getId(), 'error'=>'Bid-ul nu poate fi gol']);
        }
        elseif ($request->get('bid')) {
            $bidding->setBid($request->get('bid'));
        }
        if ($request->get('max_bid')) {
            $bidding->setMaxBid($request->get('max_bid'));
        }

        $this->entityManager->persist($bidding);
        $this->entityManager->flush();

        $newBidEvent = new BidEvent($bidding);
        $eventDispatcher->dispatch(
            BidEvent::NAME,
            $newBidEvent
        );

        return $this->redirectToRoute('product_list', ['id' => $product->getId()]);
    }
}