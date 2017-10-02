<?php

// src/Blogger/BlogBundle/Controller/PageController.php

namespace AppBundle\Controller\Page;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Controller for base pages.
 */
class PageController extends Controller {

    /**
     * Renders "about" page.
     * 
     * @Route("/about", name="about")
     * @Method("GET")
     */
    public function aboutAction() {
        return $this->render(':Blog\Page:about.html.twig');
    }

    /**
     * Renders "lessons" page.
     * 
     * @Route("/lessons", name="lessons")
     * @Method("GET")
     */
    public function lessonsAction() {
        return $this->render(':Blog\Page:nonews.html.twig');
    }

    /**
     * Renders "teachers" page.
     * 
     * @Route("/teachers", name="teachers")
     * @Method("GET")
     */
    public function teachersAction() {
        return $this->render(':Blog\Page:nonews.html.twig');
    }
    
    /**
     * Renders "study in Japan" page.
     * 
     * @Route("/study-in-japan", name="study-in-japan")
     * @Method("GET")
     */
    public function studyAction() {
        return $this->render(':Blog\Page:nonews.html.twig');
    }

    /**
     * Renders "contacts" page.
     * 
     * @Route("/contacts", name="contacts")
     * @Method("GET")
     */
    public function contactsAction() {
        return $this->render(':Blog\Page:contacts.html.twig');
    }

}
