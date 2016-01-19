<?php
/**
 * Created by PhpStorm.
 * User: Sineth
 * Date: 12/13/2015
 * Time: 7:00 PM
 *
 */

namespace application\MainBundle\Resources\Entity;

class PracticeSchedule{
    private $sport_id;
    private $resource_id;
    private $practise_Date;
    private $practise_start_time;
    private $resource_name;
    private $practise_end_time;

    /**
     * @return mixed
     */
    public function getPractiseEndTime()
    {
        return $this->practise_end_time;
    }

    /**
     * @param mixed $practise_end_time
     */
    public function setPractiseEndTime($practise_end_time)
    {
        $this->practise_end_time = $practise_end_time;
    }
    private $sport_name;

    /**
     * @return mixed
     */
    public function getSportName()
    {
        return $this->sport_name;
    }

    /**
     * @param mixed $sport_name
     */
    public function setSportName($sport_name)
    {
        $this->sport_name = $sport_name;
    }

    /**
     * @return mixed
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * @param mixed $resource_name
     */
    public function setResourceName($resource_name)
    {
        $this->resource_name = $resource_name;
    }
    /**
     * @return mixed
     */
    public function getSportId()
    {
        return $this->sport_id;
    }

    /**
     * @param mixed $sport_id
     */
    public function setSportId($sport_id)
    {
        $this->sport_id = $sport_id;
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
    public function getPractiseDate()
    {
        return $this->practise_Date;
    }

    /**
     * @param mixed $practise_Date
     */
    public function setPractiseDate($practise_Date)
    {
        $this->practise_Date = $practise_Date;
    }

    /**
     * @return mixed
     */
    public function getPractiseStartTime()
    {
        return $this->practise_start_time;
    }

    /**
     * @param mixed $practise_time
     */
    public function setPractiseStartTime($practise_start_time)
    {
        $this->practise_time = $practise_start_time;
    }

}