<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClienteGarantia
 *
 * @ORM\Table(name="cliente_garantia", uniqueConstraints={@ORM\UniqueConstraint(name="cliente_garantia_pk", columns={"id"})}, indexes={@ORM\Index(name="tiene_fk", columns={"idcliente"}), @ORM\Index(name="conforma_fk", columns={"idgarantia"})})
 * @ORM\Entity
 */
class ClienteGarantia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cliente_garantia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="docreferenciaclientegarantia", type="string", length=30, nullable=false)
     */
    private $docreferenciaclientegarantia;

    /**
     * @var string
     *
     * @ORM\Column(name="valorclientegarantia", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $valorclientegarantia;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacionclientegarantia", type="string", length=50, nullable=false)
     */
    private $ubicacionclientegarantia;

    /**
     * @var string
     *
     * @ORM\Column(name="observacionclientegarantia", type="string", length=150, nullable=false)
     */
    private $observacionclientegarantia;

    /**
     * @var \Garantia
     *
     * @ORM\ManyToOne(targetEntity="Garantia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idgarantia", referencedColumnName="id")
     * })
     */
    private $idgarantia;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="clientegarantias")
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
     * Set docreferenciaclientegarantia
     *
     * @param string $docreferenciaclientegarantia
     * @return ClienteGarantia
     */
    public function setDocreferenciaclientegarantia($docreferenciaclientegarantia)
    {
        $this->docreferenciaclientegarantia = $docreferenciaclientegarantia;

        return $this;
    }

    /**
     * Get docreferenciaclientegarantia
     *
     * @return string 
     */
    public function getDocreferenciaclientegarantia()
    {
        return $this->docreferenciaclientegarantia;
    }

    /**
     * Set valorclientegarantia
     *
     * @param string $valorclientegarantia
     * @return ClienteGarantia
     */
    public function setValorclientegarantia($valorclientegarantia)
    {
        $this->valorclientegarantia = $valorclientegarantia;

        return $this;
    }

    /**
     * Get valorclientegarantia
     *
     * @return string 
     */
    public function getValorclientegarantia()
    {
        return $this->valorclientegarantia;
    }

    /**
     * Set ubicacionclientegarantia
     *
     * @param string $ubicacionclientegarantia
     * @return ClienteGarantia
     */
    public function setUbicacionclientegarantia($ubicacionclientegarantia)
    {
        $this->ubicacionclientegarantia = $ubicacionclientegarantia;

        return $this;
    }

    /**
     * Get ubicacionclientegarantia
     *
     * @return string 
     */
    public function getUbicacionclientegarantia()
    {
        return $this->ubicacionclientegarantia;
    }

    /**
     * Set observacionclientegarantia
     *
     * @param string $observacionclientegarantia
     * @return ClienteGarantia
     */
    public function setObservacionclientegarantia($observacionclientegarantia)
    {
        $this->observacionclientegarantia = $observacionclientegarantia;

        return $this;
    }

    /**
     * Get observacionclientegarantia
     *
     * @return string 
     */
    public function getObservacionclientegarantia()
    {
        return $this->observacionclientegarantia;
    }

    /**
     * Set idgarantia
     *
     * @param \ues\peraBundle\Entity\Garantia $idgarantia
     * @return ClienteGarantia
     */
    public function setIdgarantia(\ues\peraBundle\Entity\Garantia $idgarantia = null)
    {
        $this->idgarantia = $idgarantia;

        return $this;
    }

    /**
     * Get idgarantia
     *
     * @return \ues\peraBundle\Entity\Garantia 
     */
    public function getIdgarantia()
    {
        return $this->idgarantia;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return ClienteGarantia
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
