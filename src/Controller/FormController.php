<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
class FormController extends AbstractController
{
    /**
     * @Route("/", name="form")
     */
    public function create(Request $request)
    {
        $contact = new ContactForm();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
        	$em= $this->getDoctrine()->getManager();

        	$em->persist($contact);
        	$em->flush();

        	$this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
           return $this->redirectToRoute("index");
       }


       return $this->render('form/index.html.twig', [
        'form' => $form->createView(),
        ]);
   }  
}
