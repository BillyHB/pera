<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClienteCredito
 *
 * @ORM\Table(name="cliente_credito", uniqueConstraints={@ORM\UniqueConstraint(name="cliente_credito_pk", columns={"id"})}, indexes={@ORM\Index(name="efectua_fk", columns={"idcliente"}), @ORM\Index(name="consta_fk", columns={"idcredito"})})
 * @ORM\Entity
 */
class ClienteCredito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cliente_credito_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="destinocredito", type="string", length=100, nullable=false)
     */
    private $destinocredito;

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
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcliente", referencedColumnName="id")
     * })
     */
    private $idcliente;



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
     * Set destinocredito
     *
     * @param string $destinocredito
     * @return ClienteCredito
     */
    public function setDestinocredito($destinocredito)
    {
        $this->destinocredito = $destinocredito;

        return $this;
    }

    /**
     * Get destinocredito
     *
     * @return string 
     */
    public function getDestinocredito()
    {
        return $this->destinocredito;
    }

    /**
     * Set idcredito
     *
     * @param \ues\peraBundle\Entity\Credito $idcredito
     * @return ClienteCredito
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

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return ClienteCredito
     */
    public function setIdcliente(\ues\peraBundle\Entity\Cliente $idcliente = null)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    /**
     * Get idcliente
     *
     * @return \ues\peraBundle\Entity\Cliente 
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }
}
