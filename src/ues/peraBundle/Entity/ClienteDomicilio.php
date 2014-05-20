<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClienteDomicilio
 *
 * @ORM\Table(name="cliente_domicilio", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_cliente_domicil_cliente_", columns={"deptoclientedomicilio", "municipioclientedomicilio", "direccionclientedomicilio", "idcliente"}), @ORM\UniqueConstraint(name="cliente_domicilio_pk", columns={"id"})}, indexes={@ORM\Index(name="contiene_fk", columns={"iddomicilio"}), @ORM\Index(name="posee_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class ClienteDomicilio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cliente_domicilio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="deptoclientedomicilio", type="string", length=15, nullable=false)
     */
    private $deptoclientedomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="municipioclientedomicilio", type="string", length=25, nullable=false)
     */
    private $municipioclientedomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionclientedomicilio", type="string", length=50, nullable=false)
     */
    private $direccionclientedomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoclientedomicilio", type="string", length=9, nullable=false)
     */
    private $telefonoclientedomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="horarioclientedomicilio", type="string", length=20, nullable=false)
     */
    private $horarioclientedomicilio;

    /**
     * @var integer
     *
     * @ORM\Column(name="aniosresidenciaclientedomicilio", type="integer", nullable=false)
     */
    private $aniosresidenciaclientedomicilio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alquilerclientedomicilio", type="string", nullable=false)
     */
    private $alquilerclientedomicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="institucionclientedomicilio", type="string", length=40, nullable=true)
     */
    private $institucionclientedomicilio;

    /**
     * @var \Domicilio
     *
     * @ORM\ManyToOne(targetEntity="Domicilio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddomicilio", referencedColumnName="id")
     * })
     */
    private $iddomicilio;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="clientedomicilio")
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
     * Set deptoclientedomicilio
     *
     * @param string $deptoclientedomicilio
     * @return ClienteDomicilio
     */
    public function setDeptoclientedomicilio($deptoclientedomicilio)
    {
        $this->deptoclientedomicilio = $deptoclientedomicilio;

        return $this;
    }

    /**
     * Get deptoclientedomicilio
     *
     * @return string 
     */
    public function getDeptoclientedomicilio()
    {
        return $this->deptoclientedomicilio;
    }

    /**
     * Set municipioclientedomicilio
     *
     * @param string $municipioclientedomicilio
     * @return ClienteDomicilio
     */
    public function setMunicipioclientedomicilio($municipioclientedomicilio)
    {
        $this->municipioclientedomicilio = $municipioclientedomicilio;

        return $this;
    }

    /**
     * Get municipioclientedomicilio
     *
     * @return string 
     */
    public function getMunicipioclientedomicilio()
    {
        return $this->municipioclientedomicilio;
    }

    /**
     * Set direccionclientedomicilio
     *
     * @param string $direccionclientedomicilio
     * @return ClienteDomicilio
     */
    public function setDireccionclientedomicilio($direccionclientedomicilio)
    {
        $this->direccionclientedomicilio = $direccionclientedomicilio;

        return $this;
    }

    /**
     * Get direccionclientedomicilio
     *
     * @return string 
     */
    public function getDireccionclientedomicilio()
    {
        return $this->direccionclientedomicilio;
    }

    /**
     * Set telefonoclientedomicilio
     *
     * @param string $telefonoclientedomicilio
     * @return ClienteDomicilio
     */
    public function setTelefonoclientedomicilio($telefonoclientedomicilio)
    {
        $this->telefonoclientedomicilio = $telefonoclientedomicilio;

        return $this;
    }

    /**
     * Get telefonoclientedomicilio
     *
     * @return string 
     */
    public function getTelefonoclientedomicilio()
    {
        return $this->telefonoclientedomicilio;
    }

    /**
     * Set horarioclientedomicilio
     *
     * @param string $horarioclientedomicilio
     * @return ClienteDomicilio
     */
    public function setHorarioclientedomicilio($horarioclientedomicilio)
    {
        $this->horarioclientedomicilio = $horarioclientedomicilio;

        return $this;
    }

    /**
     * Get horarioclientedomicilio
     *
     * @return string 
     */
    public function getHorarioclientedomicilio()
    {
        return $this->horarioclientedomicilio;
    }

    /**
     * Set aniosresidenciaclientedomicilio
     *
     * @param integer $aniosresidenciaclientedomicilio
     * @return ClienteDomicilio
     */
    public function setAniosresidenciaclientedomicilio($aniosresidenciaclientedomicilio)
    {
        $this->aniosresidenciaclientedomicilio = $aniosresidenciaclientedomicilio;

        return $this;
    }

    /**
     * Get aniosresidenciaclientedomicilio
     *
     * @return integer 
     */
    public function getAniosresidenciaclientedomicilio()
    {
        return $this->aniosresidenciaclientedomicilio;
    }

    /**
     * Set alquilerclientedomicilio
     *
     * @param integer $alquilerclientedomicilio
     * @return ClienteDomicilio
     */
    public function setAlquilerclientedomicilio($alquilerclientedomicilio)
    {
        $this->alquilerclientedomicilio = $alquilerclientedomicilio;

        return $this;
    }

    /**
     * Get alquilerclientedomicilio
     *
     * @return integer 
     */
    public function getAlquilerclientedomicilio()
    {
        return $this->alquilerclientedomicilio;
    }

    /**
     * Set institucionclientedomicilio
     *
     * @param string $institucionclientedomicilio
     * @return ClienteDomicilio
     */
    public function setInstitucionclientedomicilio($institucionclientedomicilio)
    {
        $this->institucionclientedomicilio = $institucionclientedomicilio;

        return $this;
    }

    /**
     * Get institucionclientedomicilio
     *
     * @return string 
     */
    public function getInstitucionclientedomicilio()
    {
        return $this->institucionclientedomicilio;
    }

    /**
     * Set iddomicilio
     *
     * @param \ues\peraBundle\Entity\Domicilio $iddomicilio
     * @return ClienteDomicilio
     */
    public function setIddomicilio(\ues\peraBundle\Entity\Domicilio $iddomicilio = null)
    {
        $this->iddomicilio = $iddomicilio;

        return $this;
    }

    /**
     * Get iddomicilio
     *
     * @return \ues\peraBundle\Entity\Domicilio 
     */
    public function getIddomicilio()
    {
        return $this->iddomicilio;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return ClienteDomicilio
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
