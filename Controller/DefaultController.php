<?php

namespace Glory\Bundle\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showAction($name)
    {
        return $this->render('GloryContentBundle:Default:show.html.twig', array('name' => $name));
    }
}
