<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $blogs = $em->getRepository('BlogBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('BlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }

    public function aboutAction()
    {
        return $this->render('BlogBundle:Page:about.html.twig');
    }

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class, $enquiry);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Perform some action, such as sending an email
                return $this->redirect($this->generateUrl('BlogBundle_contact'));
            }
        }

        return $this->render('BlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
