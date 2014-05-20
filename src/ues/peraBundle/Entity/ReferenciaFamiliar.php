<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferenciaFamiliar
 *
 * @ORM\Table(name="referencia_familiar", uniqueConstraints={@ORM\UniqueConstraint(name="referencia_familiar_pk", columns={"id"})}, indexes={@ORM\Index(name="proporciona_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class ReferenciaFamiliar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="referencia_familiar_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrereffamiliar", type="string", length=75, nullable=false)
     */
    private $nombrereffamiliar;

    /**
     * @var string
     *
     * @ORM\Column(name="parentescoreffamiliar", type="string", length=15, nullable=false)
     */
    private $parentescoreffamiliar;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionreffamiliar", type="string", length=50, nullable=false)
     */
    private $direccionreffamiliar;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoreffamiliar", type="string", nullable=false)
     */
    private $telefonoreffamiliar;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="refsfamiliar")
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
     * Set nombrereffamiliar
     *
     * @param string $nombrereffamiliar
     * @return ReferenciaFamiliar
     */
    public function setNombrereffamiliar($nombrereffamiliar)
    {
        $this->nombrereffamiliar = $nombrereffamiliar;

        return $this;
    }

    /**
     * Get nombrereffamiliar
     *
     * @return string 
     */
    public function getNombrereffamiliar()
    {
        return $this->nombrereffamiliar;
    }

    /**
     * Set parentescoreffamiliar
     *
     * @param string $parentescoreffamiliar
     * @return ReferenciaFamiliar
     */
    public function setParentescoreffamiliar($parentescoreffamiliar)
    {
        $this->parentescoreffamiliar = $parentescoreffamiliar;

        return $this;
    }

    /**
     * Get parentescoreffamiliar
     *
     * @return string 
     */
    public function getParentescoreffamiliar()
    {
        return $this->parentescoreffamiliar;
    }

    /**
     * Set direccionreffamiliar
     *
     * @param string $direccionreffamiliar
     * @return ReferenciaFamiliar
     */
    public function setDireccionreffamiliar($direccionreffamiliar)
    {
        $this->direccionreffamiliar = $direccionreffamiliar;

        return $this;
    }

    /**
     * Get direccionreffamiliar
     *
     * @return string 
     */
    public function getDireccionreffamiliar()
    {
        return $this->direccionreffamiliar;
    }

    /**
     * Set telefonoreffamiliar
     *
     * @param string $telefonoreffamiliar
     * @return ReferenciaFamiliar
     */
    public function setTelefonoreffamiliar($telefonoreffamiliar)
    {
        $this->telefonoreffamiliar = $telefonoreffamiliar;

        return $this;
    }

    /**
     * Get telefonoreffamiliar
     *
     * @return string 
     */
    public function getTelefonoreffamiliar()
    {
        return $this->telefonoreffamiliar;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return ReferenciaFamiliar
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
