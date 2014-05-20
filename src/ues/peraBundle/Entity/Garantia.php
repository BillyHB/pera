<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Garantia
 *
 * @ORM\Table(name="garantia", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_garantia_garantia", columns={"tipogarantia"}), @ORM\UniqueConstraint(name="garantia_pk", columns={"id"})})
 * @ORM\Entity
 */
class Garantia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="garantia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipogarantia", type="string", length=25, nullable=false)
     */
    private $tipogarantia;



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
     * Set tipogarantia
     *
     * @param string $tipogarantia
     * @return Garantia
     */
    public function setTipogarantia($tipogarantia)
    {
        $this->tipogarantia = $tipogarantia;

        return $this;
    }

    /**
     * Get tipogarantia
     *
     * @return string 
     */
    public function getTipogarantia()
    {
        return $this->tipogarantia;
    }
    
    public function __toString() {
      return $this->tipogarantia;
    }
}
