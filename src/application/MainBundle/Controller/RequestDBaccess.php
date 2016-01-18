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
            $request->setRequestId($row["request_id"]);
            $request->setStudentId($row["student_id"]);
            $request->setRequestDate($row["requestDate"]);
            $requests[$req_num]=$request;
            $req_num++;
        }
        return $requests;
    }
}