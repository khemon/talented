<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TJob
 *
 * @ORM\Table(name="t_job", indexes={@ORM\Index(name="fk_id_talent_job", columns={"talent"}), @ORM\Index(name="fk_id_user_job", columns={"owner"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobRepository")
 */
class TJob
{
    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=100, nullable=false)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=100, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="address3", type="string", length=100, nullable=true)
     */
    private $address3;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=7, nullable=false)
     */
    private $postalCode;

    /**
     * @var point
     *
     * @ORM\Column(name="location", type="point", nullable=false)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @var \AppBundle\Entity\TTalent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TTalent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="talent", referencedColumnName="id")
     * })
     */
    private $talent;



    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return TJob
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return TJob
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     *
     * @return TJob
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return TJob
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set location
     *
     * @param point $location
     *
     * @return TJob
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return point
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return TJob
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TJob
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\TUser $owner
     *
     * @return TJob
     */
    public function setOwner(\AppBundle\Entity\TUser $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\TUser
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set talent
     *
     * @param \AppBundle\Entity\TTalent $talent
     *
     * @return TJob
     */
    public function setTalent(\AppBundle\Entity\TTalent $talent = null)
    {
        $this->talent = $talent;

        return $this;
    }

    /**
     * Get talent
     *
     * @return \AppBundle\Entity\TTalent
     */
    public function getTalent()
    {
        return $this->talent;
    }
}
