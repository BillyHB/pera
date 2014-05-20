<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domicilio
 *
 * @ORM\Table(name="domicilio", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_domicilio_domicili", columns={"tipodomicilio"}), @ORM\UniqueConstraint(name="domicilio_pk", columns={"id"})})
 * @ORM\Entity
 */
class Domicilio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="domicilio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodomicilio", type="string", length=15, nullable=false)
     */
    private $tipodomicilio;



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
     * Set tipodomicilio
     *
     * @param string $tipodomicilio
     * @return Domicilio
     */
    public function setTipodomicilio($tipodomicilio)
    {
        $this->tipodomicilio = $tipodomicilio;

        return $this;
    }

    /**
     * Get tipodomicilio
     *
     * @return string 
     */
    public function getTipodomicilio()
    {
        return $this->tipodomicilio;
    }
    
    public function __toString() {
        return $this->tipodomicilio;
    }
}
