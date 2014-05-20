<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferenciaLaboral
 *
 * @ORM\Table(name="referencia_laboral", uniqueConstraints={@ORM\UniqueConstraint(name="ak_uk_referencia_labo_referenc", columns={"idcliente", "nombreempresareflaboral"}), @ORM\UniqueConstraint(name="referencia_laboral_pk", columns={"id"})}, indexes={@ORM\Index(name="presenta_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class ReferenciaLaboral
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="referencia_laboral_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreempresareflaboral", type="string", length=30, nullable=false)
     */
    private $nombreempresareflaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionreflaboral", type="string", length=50, nullable=false)
     */
    private $direccionreflaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoreflaboral", type="string", nullable=false)
     */
    private $telefonoreflaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="cargoreflaboral", type="string", length=30, nullable=false)
     */
    private $cargoreflaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="salarioreflaboral", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $salarioreflaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrejefereflaboral", type="string", length=30, nullable=false)
     */
    private $nombrejefereflaboral;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="refslaboral")
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
     * Set nombreempresareflaboral
     *
     * @param string $nombreempresareflaboral
     * @return ReferenciaLaboral
     */
    public function setNombreempresareflaboral($nombreempresareflaboral)
    {
        $this->nombreempresareflaboral = $nombreempresareflaboral;

        return $this;
    }

    /**
     * Get nombreempresareflaboral
     *
     * @return string 
     */
    public function getNombreempresareflaboral()
    {
        return $this->nombreempresareflaboral;
    }

    /**
     * Set direccionreflaboral
     *
     * @param string $direccionreflaboral
     * @return ReferenciaLaboral
     */
    public function setDireccionreflaboral($direccionreflaboral)
    {
        $this->direccionreflaboral = $direccionreflaboral;

        return $this;
    }

    /**
     * Get direccionreflaboral
     *
     * @return string 
     */
    public function getDireccionreflaboral()
    {
        return $this->direccionreflaboral;
    }

    /**
     * Set telefonoreflaboral
     *
     * @param string $telefonoreflaboral
     * @return ReferenciaLaboral
     */
    public function setTelefonoreflaboral($telefonoreflaboral)
    {
        $this->telefonoreflaboral = $telefonoreflaboral;

        return $this;
    }

    /**
     * Get telefonoreflaboral
     *
     * @return string 
     */
    public function getTelefonoreflaboral()
    {
        return $this->telefonoreflaboral;
    }

    /**
     * Set cargoreflaboral
     *
     * @param string $cargoreflaboral
     * @return ReferenciaLaboral
     */
    public function setCargoreflaboral($cargoreflaboral)
    {
        $this->cargoreflaboral = $cargoreflaboral;

        return $this;
    }

    /**
     * Get cargoreflaboral
     *
     * @return string 
     */
    public function getCargoreflaboral()
    {
        return $this->cargoreflaboral;
    }

    /**
     * Set salarioreflaboral
     *
     * @param string $salarioreflaboral
     * @return ReferenciaLaboral
     */
    public function setSalarioreflaboral($salarioreflaboral)
    {
        $this->salarioreflaboral = $salarioreflaboral;

        return $this;
    }

    /**
     * Get salarioreflaboral
     *
     * @return string 
     */
    public function getSalarioreflaboral()
    {
        return $this->salarioreflaboral;
    }

    /**
     * Set nombrejefereflaboral
     *
     * @param string $nombrejefereflaboral
     * @return ReferenciaLaboral
     */
    public function setNombrejefereflaboral($nombrejefereflaboral)
    {
        $this->nombrejefereflaboral = $nombrejefereflaboral;

        return $this;
    }

    /**
     * Get nombrejefereflaboral
     *
     * @return string 
     */
    public function getNombrejefereflaboral()
    {
        return $this->nombrejefereflaboral;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return ReferenciaLaboral
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
