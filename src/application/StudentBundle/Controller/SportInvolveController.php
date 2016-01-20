<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 2:58 PM
 */

namespace application\StudentBundle\Controller;


use application\MainBundle\Controller\SportDBaccess;
use application\MainBundle\Controller\StudentDBaccess;
use application\MainBundle\Resources\Entity\SportInvolve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Resources\Entity;

class SportInvolveController extends Controller
{


    public function indexAction()
    {
        $sportList=SportDBaccess::getAllSports();
        return $this->render('applicationStudentBundle:Default:AddStudentSPD.html.twig',array('sportList' => ($sportList)));
    }

    public function addSportInvolveAction(SportInvolve $sportInvolve){
        StudentDBaccess::addSportInvolve($sportInvolve);
    }
=======
<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/13/2015
 * Time: 2:58 PM
 */

namespace application\StudentBundle\Controller;


use application\MainBundle\Controller\SportDBaccess;
use application\MainBundle\Controller\StudentDBaccess;
use application\MainBundle\Resources\Entity\SportInvolve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Resources\Entity;

class SportInvolveController extends Controller
{


    public function indexAction()
    {
        $sportList=SportDBaccess::getAllSports();
        return $this->render('applicationStudentBundle:Default:AddStudentSPD.html.twig',array('sportList' => ($sportList)));
    }

    public function addSportInvolveAction(SportInvolve $sportInvolve){

    }
>>>>>>> 66d486d01253d6575dffd1cc30354441d7b77312
}