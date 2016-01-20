<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/17/2015
 * Time: 7:26 AM
 */

namespace application\MainBundle\Resources\Entity;


class StudentContact
{
    private $studentId;
    private $contactNo;

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }

    /**
     * @param mixed $contactNo
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;
    }
}