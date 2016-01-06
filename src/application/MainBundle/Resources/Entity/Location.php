<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 2015-12-15
 * Time: PM 10:10
 */

namespace application\MainBundle\Resources\Entity;


class Location
{
    private $resourceid;
    private $name;
    private $session;
    private $type;

    /**
     * @return mixed
     */
    public function getResourceid()
    {
        return $this->resourceid;
    }

    /**
     * @param mixed $resourceid
     */
    public function setResourceid($resourceid)
    {
        $this->resourceid = $resourceid;
    }

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
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



}
