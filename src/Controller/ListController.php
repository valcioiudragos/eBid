<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 08-Sep-18
 * Time: 18:02
 */

namespace App\Controller;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * @Route("/", name="list_main")
     */
    public function list()
    {
        $products = $this->productRepository->findBy([], null, 10, 0);
        return $this->render('list/list.html.twig',
            ['products' => $products]
        );
    }
}