<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/16/2015
 * Time: 11:31 AM
 */

namespace application\MainBundle\Resources\Entity;


class RequestResource
{
    private $request_id;
    private $resource_id;

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
    public function getItemBorrowingDate()
    {
        return $this->itemBorrowingDate;
    }

    /**
     * @param mixed $itemBorrowingDate
     */
    public function setItemBorrowingDate($itemBorrowingDate)
    {
        $this->itemBorrowingDate = $itemBorrowingDate;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param mixed $issueDate
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * @param mixed $returnDate
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    private $itemBorrowingDate;
    private $issueDate;
    private $returnDate;
    private $status;

}