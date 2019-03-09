<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Entity\Page;
use App\Form\ContactUsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EnquiryController extends AbstractController
{
    /**
     * @Route("/contact-us", name="app_enquiry_contact")
     */
    public function index(EntityManagerInterface $em, Request $request)
    {
        $page = $em->getRepository(Page::class)->findOneBy(['slug' => 'contact-us']);

        // Create form
        $enquiry = new ContactUs();
        $form = $this->createForm(ContactUsType::class, $enquiry);

        // Handle form
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('app_default_homepage');
        }

        return $this->render("enquiry/contact-us.html.twig", [
            'page' => $page,
            'form' => $form->createView()
        ]);
    }
}
