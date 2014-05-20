<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credito
 *
 * @ORM\Table(name="credito", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_credito_credito", columns={"nomcredito"}), @ORM\UniqueConstraint(name="credito_pk", columns={"id"})})
 * @ORM\Entity
 */
class Credito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="credito_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomcredito", type="string", length=20, nullable=false)
     */
    private $nomcredito;



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
     * Set nomcredito
     *
     * @param string $nomcredito
     * @return Credito
     */
    public function setNomcredito($nomcredito)
    {
        $this->nomcredito = $nomcredito;

        return $this;
    }

    /**
     * Get nomcredito
     *
     * @return string 
     */
    public function getNomcredito()
    {
        return $this->nomcredito;
    }
    
    public function __toString() {
      return $this->nomcredito;
    }
}
