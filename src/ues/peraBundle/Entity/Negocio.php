<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Negocio
 *
 * @ORM\Table(name="negocio", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_negocio_negocio", columns={"idcliente", "nombrenegocio"}), @ORM\UniqueConstraint(name="negocio_pk", columns={"id"})}, indexes={@ORM\Index(name="asigna_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class Negocio
{
    
    /**
     * @ORM\OneToOne(targetEntity="GastosgrlNegocio", mappedBy="idnegocio", cascade={"persist", "remove"})
     */
    protected $gastosgrlnegocio;
    
    /**
     * @ORM\OneToOne(targetEntity="ActivoBg", mappedBy="idnegocio", cascade={"persist", "remove"})
     */
    protected $activobg;
    
    /**
     * @ORM\OneToOne(targetEntity="PasivoPatrimonioBg", mappedBy="idnegocio", cascade={"persist", "remove"})
     */
    protected $pasivopatrimoniobg;
    
    /**
     * @ORM\OneToOne(targetEntity="IngresoFlujocaja", mappedBy="idnegocio", cascade={"persist", "remove"})
     */
    protected $ingresoflujocaja;
    
    /**
     * @ORM\OneToOne(targetEntity="GastosFlujocaja", mappedBy="idnegocio", cascade={"persist", "remove"})
     */
    protected $gastosflujocaja;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="negocio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrenegocio", type="string", length=30, nullable=false)
     */
    private $nombrenegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="deptonegocio", type="string", length=15, nullable=false)
     */
    private $deptonegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="municipionegocio", type="string", length=25, nullable=false)
     */
    private $municipionegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionnegocio", type="string", length=50, nullable=false)
     */
    private $direccionnegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefononegocio", type="string", length=9, nullable=false)
     */
    private $telefononegocio;

    /**
     * @var string
     *
     * @ORM\Column(name="horarionegocio", type="string", length=20, nullable=false)
     */
    private $horarionegocio;

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
     * Set nombrenegocio
     *
     * @param string $nombrenegocio
     * @return Negocio
     */
    public function setNombrenegocio($nombrenegocio)
    {
        $this->nombrenegocio = $nombrenegocio;

        return $this;
    }

    /**
     * Get nombrenegocio
     *
     * @return string 
     */
    public function getNombrenegocio()
    {
        return $this->nombrenegocio;
    }

    /**
     * Set deptonegocio
     *
     * @param string $deptonegocio
     * @return Negocio
     */
    public function setDeptonegocio($deptonegocio)
    {
        $this->deptonegocio = $deptonegocio;

        return $this;
    }

    /**
     * Get deptonegocio
     *
     * @return string 
     */
    public function getDeptonegocio()
    {
        return $this->deptonegocio;
    }

    /**
     * Set municipionegocio
     *
     * @param string $municipionegocio
     * @return Negocio
     */
    public function setMunicipionegocio($municipionegocio)
    {
        $this->municipionegocio = $municipionegocio;

        return $this;
    }

    /**
     * Get municipionegocio
     *
     * @return string 
     */
    public function getMunicipionegocio()
    {
        return $this->municipionegocio;
    }

    /**
     * Set direccionnegocio
     *
     * @param string $direccionnegocio
     * @return Negocio
     */
    public function setDireccionnegocio($direccionnegocio)
    {
        $this->direccionnegocio = $direccionnegocio;

        return $this;
    }

    /**
     * Get direccionnegocio
     *
     * @return string 
     */
    public function getDireccionnegocio()
    {
        return $this->direccionnegocio;
    }

    /**
     * Set telefononegocio
     *
     * @param string $telefononegocio
     * @return Negocio
     */
    public function setTelefononegocio($telefononegocio)
    {
        $this->telefononegocio = $telefononegocio;

        return $this;
    }

    /**
     * Get telefononegocio
     *
     * @return string 
     */
    public function getTelefononegocio()
    {
        return $this->telefononegocio;
    }

    /**
     * Set horarionegocio
     *
     * @param string $horarionegocio
     * @return Negocio
     */
    public function setHorarionegocio($horarionegocio)
    {
        $this->horarionegocio = $horarionegocio;

        return $this;
    }

    /**
     * Get horarionegocio
     *
     * @return string 
     */
    public function getHorarionegocio()
    {
        return $this->horarionegocio;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return Negocio
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
    
    
    public function getGastosgrlnegocio()
    {
        return $this->gastosgrlnegocio;
    }

    public function setGastosgrlnegocio($gastosgrlnegocio)
    {
        $this->gastosgrlnegocio = $gastosgrlnegocio;
        
        $gastosgrlnegocio->setIdnegocio($this);
        
    }
    
    public function getActivobg()
    {
        return $this->activobg;
    }

    public function setActivobg($activobg)
    {
        $this->activobg = $activobg;
        
        $activobg->setIdnegocio($this);
        
    }
    
    public function getPasivopatrimoniobg()
    {
        return $this->pasivopatrimoniobg;
    }

    public function setPasivopatrimoniobg($pasivopatrimoniobg)
    {
        $this->pasivopatrimoniobg = $pasivopatrimoniobg;
        
        $pasivopatrimoniobg->setIdnegocio($this);
        
    }
    
    public function getIngresoflujocaja()
    {
        return $this->ingresoflujocaja;
    }

    public function setIngresoflujocaja($ingresoflujocaja)
    {
        $this->ingresoflujocaja = $ingresoflujocaja;
        
        $ingresoflujocaja->setIdnegocio($this);
        
    }
    
    public function getGastosflujocaja()
    {
        return $this->gastosflujocaja;
    }

    public function setGastosflujocaja($gastosflujocaja)
    {
        $this->gastosflujocaja = $gastosflujocaja;
        
        $gastosflujocaja->setIdnegocio($this);
        
    }
    
}
