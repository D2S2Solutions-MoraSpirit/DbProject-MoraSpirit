<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 15/12/15
 * Time: 9:30 AM
 */
namespace application\MainBundle\Resources\Entity;
class requestResourceDamage{
    private $request_id;
    private $resource_id;
    private $borrowingDate;
    private $description;

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * @param mixed $request_id
     */
    public function setRequestId($request_id)
    {
        $this->request_id = $request_id;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resource_id;
    }

    /**
     * @param mixed $resource_id
     */
    public function setResourceId($resource_id)
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return mixed
     */
    public function getBorrowingDate()
    {
        return $this->borrowingDate;
    }

    /**
     * @param mixed $borrowingDate
     */
    public function setBorrowingDate($borrowingDate)
    {
        $this->borrowingDate = $borrowingDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}