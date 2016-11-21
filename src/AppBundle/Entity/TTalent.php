<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TTalent
 *
 * @ORM\Table(name="t_talent", indexes={@ORM\Index(name="fk_id_user_idx", columns={"id_user"})})
 * @ORM\Entity
 */
class TTalent
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=180, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return TTalent
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
     * Set id
     *
     * @param integer $id
     *
     * @return TTalent
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set idUser
     *
     * @param \AppBundle\Entity\TUser $idUser
     *
     * @return TTalent
     */
    public function setIdUser(\AppBundle\Entity\TUser $idUser)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\TUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
