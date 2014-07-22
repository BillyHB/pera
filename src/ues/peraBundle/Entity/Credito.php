<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Credito
 *
 * @ORM\Table(name="credito", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_credito_credito", columns={"nomcredito"}), @ORM\UniqueConstraint(name="credito_pk", columns={"id"})})
 * @ORM\Entity
 */
class Credito
{
    
    public function __construct() {
        
        $this->creditodestino = new ArrayCollection();
        
    }
    
    /**
     * @ORM\OneToMany(targetEntity="CreditoDestino", mappedBy="idcredito", cascade={"persist", "remove"})
     */
    protected $creditodestino;    
    
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
    
    
    public function getCreditodestino()
    {
        return $this->creditodestino;
    }

    public function setCreditodestino(\Doctrine\Common\Collections\Collection $creditodestinos)
    {
        $this->creditodestino = $creditodestinos;
        
        foreach ($creditodestinos as $creditodestino) {
            $creditodestino->setIdcredito($this);
        }
    }
}
