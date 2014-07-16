<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CreditoDestino
 *
 * @ORM\Table(name="credito_destino", uniqueConstraints={@ORM\UniqueConstraint(name="credito_destino_pk", columns={"id"})}, indexes={@ORM\Index(name="credito_destino_fk", columns={"iddestino"}), @ORM\Index(name="credito_destino2_fk", columns={"idcredito"})})
 * @ORM\Entity
 */
class CreditoDestino
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="credito_destino_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Destino
     *
     * @ORM\ManyToOne(targetEntity="Destino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddestino", referencedColumnName="id")
     * })
     */
    private $iddestino;

    /**
     * @var \Credito
     *
     * @ORM\ManyToOne(targetEntity="Credito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcredito", referencedColumnName="id")
     * })
     */
    private $idcredito;



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
     * Set iddestino
     *
     * @param \ues\peraBundle\Entity\Destino $iddestino
     * @return CreditoDestino
     */
    public function setIddestino(\ues\peraBundle\Entity\Destino $iddestino = null)
    {
        $this->iddestino = $iddestino;

        return $this;
    }

    /**
     * Get iddestino
     *
     * @return \ues\peraBundle\Entity\Destino 
     */
    public function getIddestino()
    {
        return $this->iddestino;
    }

    /**
     * Set idcredito
     *
     * @param \ues\peraBundle\Entity\Credito $idcredito
     * @return CreditoDestino
     */
    public function setIdcredito(\ues\peraBundle\Entity\Credito $idcredito = null)
    {
        $this->idcredito = $idcredito;

        return $this;
    }

    /**
     * Get idcredito
     *
     * @return \ues\peraBundle\Entity\Credito 
     */
    public function getIdcredito()
    {
        return $this->idcredito;
    }
}
