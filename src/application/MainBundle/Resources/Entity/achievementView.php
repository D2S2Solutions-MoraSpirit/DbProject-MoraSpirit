<?php
/**
 * Created by PhpStorm.
 * User: Dimuth Tharaka
 * Date: 11/12/15
 * Time: 4:42 AM
 */
namespace application\MainBundle\Resources\Entity;
class achievementView{


    private $description;
    private $achievedDate;
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * @return mixed
     */
    public function getAchievedDate()
    {
        return $this->achievedDate;
    }

    /**
     * @param mixed $achievedDate
     */
    public function setAchievedDate($achievedDate)
    {
        $this->achievedDate = $achievedDate;
    }






}