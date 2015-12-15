<?php

namespace application\LocationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('applicationLocationsBundle:Default:index.html.twig');
    }
}
