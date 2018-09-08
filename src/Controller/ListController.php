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

class ListController extends Controller
{

    /**
     * @Route("/", name="list_main")
     */
    public function list()
    {
        return $this->render('list/list.html.twig');
    }

    /**
     * @Route("/product/{id}", name="list_product")
     */
    public function product()
    {
        return $this->render('list/product.html.twig');
    }
}