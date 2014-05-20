<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk1_cliente_cliente", columns={"duicliente"}), @ORM\UniqueConstraint(name="ak_uk2_cliente_cliente", columns={"issscliente"}), @ORM\UniqueConstraint(name="ak_uk3_cliente_cliente", columns={"nitcliente"}), @ORM\UniqueConstraint(name="cliente_pk", columns={"id"})})
 * @ORM\Entity
 */
class Cliente
{
    
    public function __construct()
    {
        $this->refslaboral = new ArrayCollection();
        $this->refsfamiliar = new ArrayCollection();
        $this->clientegarantias = new ArrayCollection();
        $this->clientedomicilio = new ArrayCollection();
    }
    
    /**
     * @ORM\OneToMany(targetEntity="ClienteDomicilio", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $clientedomicilio;
    
    /**
     * @ORM\OneToMany(targetEntity="ClienteGarantia", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $clientegarantias;
    
    /**
     * @ORM\OneToMany(targetEntity="ReferenciaLaboral", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $refslaboral;
    
    /**
     * @ORM\OneToMany(targetEntity="ReferenciaFamiliar", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $refsfamiliar;
    
    /**
     * @ORM\OneToOne(targetEntity="IngresosFamiliares", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $ingresosfamiliares;
    
    /**
     * @ORM\OneToOne(targetEntity="GastosFamiliares", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $gastosfamiliares;
    
    /**
     * @ORM\OneToOne(targetEntity="Negocio", mappedBy="idcliente", cascade={"persist", "remove"})
     */
    protected $negocio;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cliente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrescliente", type="string", length=50, nullable=false)
     */
    private $nombrescliente;

    /**
     * @var string
     *
     * @ORM\Column(name="primapellidocliente", type="string", length=30, nullable=false)
     */
    private $primapellidocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="segapellidocliente", type="string", length=30, nullable=true)
     */
    private $segapellidocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="lecturafirmacliente", type="string", length=25, nullable=false)
     */
    private $lecturafirmacliente;

    /**
     * @var string
     *
     * @ORM\Column(name="duicliente", type="string", length=10, nullable=false)
     */
    private $duicliente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duifechaexpcliente", type="date", nullable=false)
     */
    private $duifechaexpcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="duilugarexpcliente", type="string", length=20, nullable=false)
     */
    private $duilugarexpcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="issscliente", type="string", length=10, nullable=false)
     */
    private $issscliente;

    /**
     * @var string
     *
     * @ORM\Column(name="nitcliente", type="string", nullable=false)
     */
    private $nitcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonocliente", type="string", nullable=false)
     */
    private $telefonocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="estadocivilcliente", type="string", nullable=false)
     */
    private $estadocivilcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="sexocliente", type="string", nullable=false)
     */
    private $sexocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="profesioncliente", type="string", length=30, nullable=false)
     */
    private $profesioncliente;

    /**
     * @var string
     *
     * @ORM\Column(name="nomconyugcliente", type="string", length=100, nullable=true)
     */
    private $nomconyugcliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="numhijocliente", type="integer", nullable=true)
     */
    private $numhijocliente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaingresocliente", type="date", nullable=false)
     */
    private $fechaingresocliente;



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
     * Set nombrescliente
     *
     * @param string $nombrescliente
     * @return Cliente
     */
    public function setNombrescliente($nombrescliente)
    {
        $this->nombrescliente = $nombrescliente;

        return $this;
    }

    /**
     * Get nombrescliente
     *
     * @return string 
     */
    public function getNombrescliente()
    {
        return $this->nombrescliente;
    }

    /**
     * Set primapellidocliente
     *
     * @param string $primapellidocliente
     * @return Cliente
     */
    public function setPrimapellidocliente($primapellidocliente)
    {
        $this->primapellidocliente = $primapellidocliente;

        return $this;
    }

    /**
     * Get primapellidocliente
     *
     * @return string 
     */
    public function getPrimapellidocliente()
    {
        return $this->primapellidocliente;
    }

    /**
     * Set segapellidocliente
     *
     * @param string $segapellidocliente
     * @return Cliente
     */
    public function setSegapellidocliente($segapellidocliente)
    {
        $this->segapellidocliente = $segapellidocliente;

        return $this;
    }

    /**
     * Get segapellidocliente
     *
     * @return string 
     */
    public function getSegapellidocliente()
    {
        return $this->segapellidocliente;
    }

    /**
     * Set lecturafirmacliente
     *
     * @param string $lecturafirmacliente
     * @return Cliente
     */
    public function setLecturafirmacliente($lecturafirmacliente)
    {
        $this->lecturafirmacliente = $lecturafirmacliente;

        return $this;
    }

    /**
     * Get lecturafirmacliente
     *
     * @return string 
     */
    public function getLecturafirmacliente()
    {
        return $this->lecturafirmacliente;
    }

    /**
     * Set duicliente
     *
     * @param string $duicliente
     * @return Cliente
     */
    public function setDuicliente($duicliente)
    {
        $this->duicliente = $duicliente;

        return $this;
    }

    /**
     * Get duicliente
     *
     * @return string 
     */
    public function getDuicliente()
    {
        return $this->duicliente;
    }

    /**
     * Set duifechaexpcliente
     *
     * @param \DateTime $duifechaexpcliente
     * @return Cliente
     */
    public function setDuifechaexpcliente($duifechaexpcliente)
    {
        $this->duifechaexpcliente = $duifechaexpcliente;

        return $this;
    }

    /**
     * Get duifechaexpcliente
     *
     * @return \DateTime 
     */
    public function getDuifechaexpcliente()
    {
        return $this->duifechaexpcliente;
    }

    /**
     * Set duilugarexpcliente
     *
     * @param string $duilugarexpcliente
     * @return Cliente
     */
    public function setDuilugarexpcliente($duilugarexpcliente)
    {
        $this->duilugarexpcliente = $duilugarexpcliente;

        return $this;
    }

    /**
     * Get duilugarexpcliente
     *
     * @return string 
     */
    public function getDuilugarexpcliente()
    {
        return $this->duilugarexpcliente;
    }

    /**
     * Set issscliente
     *
     * @param string $issscliente
     * @return Cliente
     */
    public function setIssscliente($issscliente)
    {
        $this->issscliente = $issscliente;

        return $this;
    }

    /**
     * Get issscliente
     *
     * @return string 
     */
    public function getIssscliente()
    {
        return $this->issscliente;
    }

    /**
     * Set nitcliente
     *
     * @param string $nitcliente
     * @return Cliente
     */
    public function setNitcliente($nitcliente)
    {
        $this->nitcliente = $nitcliente;

        return $this;
    }

    /**
     * Get nitcliente
     *
     * @return string 
     */
    public function getNitcliente()
    {
        return $this->nitcliente;
    }

    /**
     * Set telefonocliente
     *
     * @param string $telefonocliente
     * @return Cliente
     */
    public function setTelefonocliente($telefonocliente)
    {
        $this->telefonocliente = $telefonocliente;

        return $this;
    }

    /**
     * Get telefonocliente
     *
     * @return string 
     */
    public function getTelefonocliente()
    {
        return $this->telefonocliente;
    }

    /**
     * Set estadocivilcliente
     *
     * @param string $estadocivilcliente
     * @return Cliente
     */
    public function setEstadocivilcliente($estadocivilcliente)
    {
        $this->estadocivilcliente = $estadocivilcliente;

        return $this;
    }

    /**
     * Get estadocivilcliente
     *
     * @return string 
     */
    public function getEstadocivilcliente()
    {
        return $this->estadocivilcliente;
    }

    /**
     * Set sexocliente
     *
     * @param string $sexocliente
     * @return Cliente
     */
    public function setSexocliente($sexocliente)
    {
        $this->sexocliente = $sexocliente;

        return $this;
    }

    /**
     * Get sexocliente
     *
     * @return string 
     */
    public function getSexocliente()
    {
        return $this->sexocliente;
    }

    /**
     * Set profesioncliente
     *
     * @param string $profesioncliente
     * @return Cliente
     */
    public function setProfesioncliente($profesioncliente)
    {
        $this->profesioncliente = $profesioncliente;

        return $this;
    }

    /**
     * Get profesioncliente
     *
     * @return string 
     */
    public function getProfesioncliente()
    {
        return $this->profesioncliente;
    }

    /**
     * Set nomconyugcliente
     *
     * @param string $nomconyugcliente
     * @return Cliente
     */
    public function setNomconyugcliente($nomconyugcliente)
    {
        $this->nomconyugcliente = $nomconyugcliente;

        return $this;
    }

    /**
     * Get nomconyugcliente
     *
     * @return string 
     */
    public function getNomconyugcliente()
    {
        return $this->nomconyugcliente;
    }

    /**
     * Set numhijocliente
     *
     * @param integer $numhijocliente
     * @return Cliente
     */
    public function setNumhijocliente($numhijocliente)
    {
        $this->numhijocliente = $numhijocliente;

        return $this;
    }

    /**
     * Get numhijocliente
     *
     * @return integer 
     */
    public function getNumhijocliente()
    {
        return $this->numhijocliente;
    }

    /**
     * Set fechaingresocliente
     *
     * @param \DateTime $fechaingresocliente
     * @return Cliente
     */
    public function setFechaingresocliente($fechaingresocliente)
    {
        $this->fechaingresocliente = $fechaingresocliente;

        return $this;
    }

    /**
     * Get fechaingresocliente
     *
     * @return \DateTime 
     */
    public function getFechaingresocliente()
    {
        return $this->fechaingresocliente;
    }
    
    
    
    public function getIngresosfamiliares()
    {
        return $this->ingresosfamiliares;
    }

    public function setIngresosfamiliares($ingresosfamiliares)
    {
        $this->ingresosfamiliares = $ingresosfamiliares;
        
        $ingresosfamiliares->setIdcliente($this);
        
    }
    
    public function getGastosfamiliares()
    {
        return $this->gastosfamiliares;
    }

    public function setGastosfamiliares($gastosfamiliares)
    {
        $this->gastosfamiliares = $gastosfamiliares;
        
        $gastosfamiliares->setIdcliente($this);
        
    }
    
    public function getNegocio()
    {
        return $this->negocio;
    }

    public function setNegocio($negocio)
    {
        $this->negocio = $negocio;
        
        $negocio->setIdcliente($this);
        
    }
    
    public function getRefslaboral()
    {
        return $this->refslaboral;
    }

    public function setRefslaboral(\Doctrine\Common\Collections\Collection $refslaboral)
    {
        $this->refslaboral = $refslaboral;
        
        foreach ($refslaboral as $reflaboral) {
            $reflaboral->setIdcliente($this);
        }
    }
    
    public function getRefsfamiliar()
    {
        return $this->refsfamiliar;
    }

    public function setRefsfamiliar(\Doctrine\Common\Collections\Collection $refsfamiliar)
    {
        $this->refsfamiliar = $refsfamiliar;
        
        foreach ($refsfamiliar as $reffamiliar) {
            $reffamiliar->setIdcliente($this);
        }
    }
    
    public function getClientegarantias()
    {
        return $this->clientegarantias;
    }

    public function setClientegarantias(\Doctrine\Common\Collections\Collection $clientegarantias)
    {
        $this->clientegarantias = $clientegarantias;
        
        foreach ($clientegarantias as $clientegarantia) {
            $clientegarantia->setIdcliente($this);
        }
    }
    
    public function getClientedomicilio()
    {
        return $this->clientedomicilio;
    }

    public function setClientedomicilio(\Doctrine\Common\Collections\Collection $clientedomicilio)
    {
        $this->clientedomicilio = $clientedomicilio;
        
        foreach ($clientedomicilio as $clientedomicilio) {
            $clientedomicilio->setIdcliente($this);
        }
    }
    
    public function __toString() {
      $nombre_completo = $this->nombrescliente." ".$this->primapellidocliente." ".$this->segapellidocliente;  
      return $nombre_completo;
    }
}
