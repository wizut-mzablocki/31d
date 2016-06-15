<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\ParcelInterface;

/**
 * Parcel
 *
 * @ORM\Table(name="parcel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParcelRepository")
 */
class Parcel implements ParcelInterface
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
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="Weight", type="integer")
     */
    
	private $weight;

	/**
	* @ORM\OneToOne(targetEntity="AppBundle\Entity\ParcelOrder", mappedBy="parcel")
	*/
	protected $parcels;
	 
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
     * Set notes
     *
     * @param string $notes
     *
     * @return Parcel
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

	
	/**
	 * Add parcels
	 *
	 * @param ParcelOrder $parcels
	 */
	public function addParcel(ParcelOrder $parcels)
	{
		$this->parcels[] = $parcels;
	}

	/**
	 * Get parcels
	 *
	 * @return Doctrine\Common\Collections\Collection 
	 */
	public function getParcels()
	{
		return $this->parcels;
	}
	
	
	
}

