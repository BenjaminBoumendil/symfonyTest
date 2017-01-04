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
        return $this->render('BlogBundle:Page:index.html.twig');
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

            if ($form->isValid()) {
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BlogBundle_contact'));
            }
        }

        return $this->render('BlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
