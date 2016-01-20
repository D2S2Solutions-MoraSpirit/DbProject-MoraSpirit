<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 18/1/16
 * Time: 10:37 PM
 */
namespace application\MainBundle\Controller;

use application\MainBundle\Resources\Entity as en;
use application\MainBundle\Controller as cont;

class RequestDBaccess{
    public static function getPendingRequests(){
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql="SELECT * FROM Request WHERE STATUS='pending'";
        $result=mysqli_query($con,$sql);
        $requests = array();

        $req_num=0;
        while($row=mysqli_fetch_row($result)){

            $request = new en\ Request();
            $request->setRequestId($row[0]);
            $request->setStudentId($row[1]);
            $request->setRequestDate($row[2]);
            $requests[$req_num]=$request;
            $req_num++;

        }




        return $requests;
    }
    public static function getRequestResource(en\ Request $request){
        $request_id = $request->getRequestId();
        $conn = cont\connection::getConnectionObject();
        $con =$conn->getConnection();
        $sql="SELECT * FROM RequestResource WHERE request_id=$request_id";
        $result=mysqli_query($con,$sql);
        $requestResources=array();
        $res_num=0;
        while($row=mysqli_fetch_row($result)){
            $requestResource =new en\ RequestResource();

            $requestResource->setResourceId($row[1]);
            $requestResource->setItemBorrowingDate($row[2]);
            $requestResource->setIssueDate($row[3]);
            $requestResource->setReturnDate($row[4]);
            $requestResource->setStatus($row[5]);
            $requestResources[$res_num]=$requestResource;
            $res_num++;

        }
        return $requestResources;
    }
}