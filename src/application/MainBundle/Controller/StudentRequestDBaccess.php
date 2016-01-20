<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/16/2015
 * Time: 4:22 PM
 */

namespace application\MainBundle\Controller;


use application\MainBundle\Resources\Entity\Request;
use application\MainBundle\Resources\Entity\RequestResource;
use Symfony\Component\Config\Definition\Exception\Exception;

class StudentRequestDBaccess
{


    public static function addStudentRequest(Request $request, array $requestResource)
    {
        try {
            $conn = connection::getConnectionObject();
            $con = $conn->getConnection();

            $con->autocommit(false);

            $sql = $con->prepare("INSERT INTO Request VALUES (?,?,?,?)");


            $requestId=$request->getRequestId();
            $studentId=$request->getStudentId();
            $date=$request->getRequestDate();;
            $status="pending";

            $sql->bind_param("ssss",$requestId,$studentId,$date,$status);


            if ($sql->execute() == TRUE) {


                foreach($requestResource as $value){
                    $isAdded=StudentRequestDBaccess::addRequestResource($con,$value);
                    if($isAdded==false){
                        $con->rollback();
                        return false;
                    }
                }
            } else {
                $con->rollback();
               return false;
            }
            $con->commit();
            return true;
        } catch (Exception $e) {
            $con->rollback();
            return false;
        } finally {
            $con->autocommit(true);
            $con->close();
        }
    }

    public static function addRequestResource($con,RequestResource $requestResource)
    {

try {
    $sql = $con->prepare("INSERT INTO  RequestResource VALUES(?,?,?,?,?,?,?)");
    $requestId = $requestResource->getRequestId();
    $resourceId = $requestResource->getResourceId();
    $qty=$requestResource->getQty();
    $borrowingDate = $requestResource->getItemBorrowingDate();
    $issueDate = date('Y-m-d');
    $returnDate = $requestResource->getReturnDate();
    $status = 1;

    $sql->bind_param("ssisssi", $requestId, $resourceId,$qty, $borrowingDate, $issueDate, $returnDate, $status);

    if ($sql->execute() == TRUE) {
        return true;
    } else {
        return false;
    }
}catch (Exception $w){
    return false;
}

    }

}