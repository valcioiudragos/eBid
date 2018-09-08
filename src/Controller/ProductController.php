<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 08-Sep-18
 * Time: 18:02
 */

namespace App\Controller;


use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class ProductController extends Controller {

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/product/{id}", name="list_product")
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
}