<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:08 PM
 */

namespace application\SportBundle\Controller;


use application\MainBundle\Controller\SportDBaccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SportController extends Controller
{

    public function getAllSportsAction(){

        $sportArray[]=SportDBaccess::getAllSports();
        return $this->render('SportBundle:Default:viewsport.html.twig',array('s'=>$sportArray));

    }

}