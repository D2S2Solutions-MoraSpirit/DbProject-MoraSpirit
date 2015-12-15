<?php
/**
 * Created by PhpStorm.
 * User: Heshan Sandamal
 * Date: 12/16/2015
 * Time: 12:09 AM
 */

namespace application\MainBundle\Resources\Entity;


class EquipmentType
{
    private $type_id;
    private $equipmentName;

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * @return mixed
     */
    public function getEquipmentName()
    {
        return $this->equipmentName;
    }

    /**
     * @param mixed $equipmentName
     */
    public function setEquipmentName($equipmentName)
    {
        $this->equipmentName = $equipmentName;
    }
}