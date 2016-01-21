<?php

namespace application\MainBundle\Controller;


use application\MainBundle\Controller\UserDBaccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use application\MainBundle\Controller as cont;
use application\MainBundle\Resources\Entity as en;

class UserController extends Controller
{
    public function authenticateUserAction(){
        
        session_unset(); 
        // destroy the session 
        /*session_destroy();*/ 
        
        $userName = $_POST["username"];
        $userPassword = $_POST["password"];
        
        $userdb=cont\UserDBaccess::getSelectedUser($userName);
        
        if ($userPassword==$userdb->getPassword()){
            /*echo "Successfully logged in";
            return $this->render('applicationMainBundle:Login:loginsuccess.html.twig');*/
            if ($userdb->getRole()=="a"){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["uname"]=$userName;
                $_SESSION["urole"]="a";
                return $this->render('applicationMainBundle:Default:mainUIAdmin.html.twig');
            }
            else if ($userdb->getRole()=="b"){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["uname"]=$userName;
                $_SESSION["urole"]="b";
                return $this->render('applicationMainBundle:Default:mainUIUser.html.twig');
            }
        }
        else{  
            echo "Please enter a valid User Name and Password";
            return $this->render('applicationMainBundle:Login:login.html.twig');
        }
        

    }
    
    public function userHomeAction(){
        if ($$_SESSION["urole"]=="a"){
                return $this->render('applicationMainBundle:Default:mainUIAdmin.html.twig');
            }
        else if ($_SESSION["urole"]=="b"){
                return $this->render('applicationMainBundle:Default:mainUIUser.html.twig');
            }
    }
    
    public function logoutUserAction(){
        session_unset(); 
        // destroy the session 
        session_destroy(); 
        return $this->render('applicationMainBundle:Login:login.html.twig');
    }
    
    
    
    
    
}