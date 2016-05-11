<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
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
     * @var bool
     *
     * @ORM\Column(name="done", type="boolean")
     */
    private $done;
	
	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Postman")
     * @ORM\JoinColumn(name="postman_id", referencedColumnName="id")
     */
	private $postman;
	
	/**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ParcelOrder")
    * @ORM\JoinColumn(name="parcelorder_id", referencedColumnName="id")
    */
	private $parcelorder;


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
     * Set done
     *
     * @param boolean $done
     *
     * @return Task
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return bool
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set postman
     *
     * @param \AppBundle\Entity\Postman $postman
     *
     * @return Task
     */
    public function setPostman(\AppBundle\Entity\Postman $postman = null)
    {
        $this->postman = $postman;

        return $this;
    }

    /**
     * Get postman
     *
     * @return \AppBundle\Entity\Postman
     */
    public function getPostman()
    {
        return $this->postman;
    }


    /**
     * Set parcelorder
     *
     * @param \AppBundle\Entity\ParcelOrder $parcelorder
     *
     * @return Task
     */
    public function setParcelorder(\AppBundle\Entity\ParcelOrder $parcelorder = null)
    {
        $this->parcelorder = $parcelorder;

        return $this;
    }

    /**
     * Get parcelorder
     *
     * @return \AppBundle\Entity\ParcelOrder
     */
    public function getParcelorder()
    {
        return $this->parcelorder;
    }
}
