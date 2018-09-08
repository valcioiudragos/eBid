<?php
/**
 * Created by PhpStorm.
 * User: dragos.valcioiu
 * Date: 08-Sep-18
 * Time: 18:02
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller {

    /**
     * @Route("/product/{id}", name="list_product")
     */
    public function product()
    {
        return $this->render('product/product.html.twig');
    }
}