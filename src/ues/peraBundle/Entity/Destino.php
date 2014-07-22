<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destino
 *
 * @ORM\Table(name="destino", uniqueConstraints={@ORM\UniqueConstraint(name="destino_pk", columns={"id"})})
 * @ORM\Entity
 */
class Destino
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="destino_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomdestino", type="string", length=50, nullable=false)
     */
    private $nomdestino;



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
     * Set nomdestino
     *
     * @param string $nomdestino
     * @return Destino
     */
    public function setNomdestino($nomdestino)
    {
        $this->nomdestino = $nomdestino;

        return $this;
    }

    /**
     * Get nomdestino
     *
     * @return string 
     */
    public function getNomdestino()
    {
        return $this->nomdestino;
    }
    
    public function __toString() {
      return $this->nomdestino;
    }
}
