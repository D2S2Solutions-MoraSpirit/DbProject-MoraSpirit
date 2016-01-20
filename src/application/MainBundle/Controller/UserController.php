<?php

namespace application\MainBundle\Controller;


use application\MainBundle\Controller\UserDBaccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;

class UserController extends Controller
{
    public function authenticateUserAction(){
        
        $userName = $_POST["username"];
        $userRole = $_POST["role"];
        $userPassword = $_POST["password"];
        
        $userdb=cont\UserDBaccess::getSelectedUser($userName);
        
        if ($userRole==$userdb->getRole() and $userPassword==$userdb->getPassword()){
            echo "Successfully logged in";
            return $this->render('applicationMainBundle:Login:loginsuccess.html.twig');
        }
        else{  
            echo "Please enter valid a User Name and Password";
            return $this->render('applicationMainBundle:Login:login.html.twig');
        }
        

    }
    
    
    
    
    
}