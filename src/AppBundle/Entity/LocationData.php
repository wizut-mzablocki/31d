<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocationData
 *
 * @ORM\Table(name="location_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationDataRepository")
 */
class LocationData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float")
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lon", type="float")
     */
    private $lon;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float")
     */
    private $distance;

    /**
     * @var int
     *
     * @ORM\Column(name="postman_id", type="integer")
     */
    private $postmanId;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", unique=false)
     */
    private $timestamp;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return LocationData
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set timestamp
     *
     * @param int $timestamp
     *
     * @return LocationData
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set lon
     *
     * @param float $lon
     *
     * @return LocationData
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set distance
     *
     * @param float $distance
     *
     * @return LocationData
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set postmanId
     *
     * @param integer $postmanId
     *
     * @return LocationData
     */
    public function setPostmanId($postmanId)
    {
        $this->postmanId = $postmanId;

        return $this;
    }

    /**
     * Get postmanId
     *
     * @return int
     */
    public function getPostmanId()
    {
        return $this->postmanId;
    }
}

