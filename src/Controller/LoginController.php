<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LoginController extends Controller
{

    public function login()
    {
        //->add('titlu', TextType::class, array('attr'=>array('class'=>'form-control')))

        error_log(".Login.");
        $form = $this->createFormBuilder($this->login())
            ->add('username', TextType::class, array('attr'=>array('class'=>'form-control')))
            ->add('password', PasswordType::class, array('attr'=>array('class'=>'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Login'))
            ->getForm();
         return $this->render('login.html.twig', array(
            'form' => $form->createView(),));
    }

}