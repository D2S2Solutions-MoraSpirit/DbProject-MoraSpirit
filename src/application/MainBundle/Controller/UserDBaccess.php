<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 1:07
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\User;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserDBaccess{
    public static function saveUser(Sport $user){

        $conn = connection::getConnectionObject();
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO AppUser VALUES (?,?,?,?)");
        $userid = $user->getUserId();
        $username = $user->getUsername();
        $roll = $user->getRole();
        $passsword = $user->getPassword();
        
        $sql->bind_param("ssss",$userid,$username,$roll,$passsword);

        if ( $sql->execute()==TRUE) {
            echo "New record created successfully (sport added)";
        } else {
            //echo "Error in adding sport: " . $sql . "<br>" ;
            echo "Error in adding sport:";
        }
    }

    public static function getAllUsers(){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();
            $stm=$con->stmt_init();
            $stm->prepare("SELECT username FROM AppUser");
            $stm->execute();
            $result = $stm->get_result();
            $userArray=array();
            $count=0;
            while ($row = $result->fetch_assoc())
            {
                $user=new User();
                $user->setUsername($row["username"]);
                $userArray[]=$sport;
            }

            return $userArray;
        }catch (Exception $e){
            return "error";
        }finally{
            //$conn->close();
            $stm->close();
        }
    }
    
    public static function getSelectedUser($username){
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();


            $stm = $con->stmt_init();

            $stm->prepare("SELECT user_id,username,role,password FROM AppUser where username=?");
            $stm->bind_param("s", $username);
//           // $result = mysqli_query($con,$sql);
//
//
            $stm->execute();
            $result = $stm->get_result();
//
            $user = new User();
//
            while ($row = $result->fetch_assoc()) {
                $user->setUserid($row["user_id"]);
                $user->setUsername($row["username"]);
                $user->setRole($row["role"]);
                $user->setPassword($row["password"]);;
            }

            return $user;
        } catch (Exception $e) {
            return "error";
        } finally {
            //$conn->close();
            $stm->close();
        }
        
    }

    public static function getSportName($id){
        try{
            $conn=connection::getConnectionObject();
            $con =$conn->getConnection();
            $stm=$con->stmt_init();
            $stm->prepare("SELECT name FROM sport WHERE sport_id="+$id);
            $stm->execute();
            $result = $stm->get_result();
            echo 'ID: '.$result['name'].'<br>';
            return $result;
        }catch(Exception $e){
            return "error";
        }finally{

        }
    }
}