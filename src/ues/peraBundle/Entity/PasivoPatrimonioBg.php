<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasivoPatrimonioBg
 *
 * @ORM\Table(name="pasivo_patrimonio_bg", uniqueConstraints={@ORM\UniqueConstraint(name="pasivo_patrimonio_bg_pk", columns={"id"})}, indexes={@ORM\Index(name="relationship_14_fk", columns={"idnegocio"})})
 * @ORM\Entity
 */
class PasivoPatrimonioBg
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pasivo_patrimonio_bg_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="proveedoresppbg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $proveedoresppbg;

    /**
     * @var string
     *
     * @ORM\Column(name="prestamosinstppbg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $prestamosinstppbg;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosprestppbg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $otrosprestppbg;

    /**
     * @var string
     *
     * @ORM\Column(name="patrimonioppbg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $patrimonioppbg;

    /**
     * @var string
     *
     * @ORM\Column(name="totalppbg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalppbg;

    /**
     * @var \Negocio
     *
     * @ORM\ManyToOne(targetEntity="Negocio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idnegocio", referencedColumnName="id")
     * })
     */
    private $idnegocio;



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
     * Set proveedoresppbg
     *
     * @param string $proveedoresppbg
     * @return PasivoPatrimonioBg
     */
    public function setProveedoresppbg($proveedoresppbg)
    {
        $this->proveedoresppbg = $proveedoresppbg;

        return $this;
    }

    /**
     * Get proveedoresppbg
     *
     * @return string 
     */
    public function getProveedoresppbg()
    {
        return $this->proveedoresppbg;
    }

    /**
     * Set prestamosinstppbg
     *
     * @param string $prestamosinstppbg
     * @return PasivoPatrimonioBg
     */
    public function setPrestamosinstppbg($prestamosinstppbg)
    {
        $this->prestamosinstppbg = $prestamosinstppbg;

        return $this;
    }

    /**
     * Get prestamosinstppbg
     *
     * @return string 
     */
    public function getPrestamosinstppbg()
    {
        return $this->prestamosinstppbg;
    }

    /**
     * Set otrosprestppbg
     *
     * @param string $otrosprestppbg
     * @return PasivoPatrimonioBg
     */
    public function setOtrosprestppbg($otrosprestppbg)
    {
        $this->otrosprestppbg = $otrosprestppbg;

        return $this;
    }

    /**
     * Get otrosprestppbg
     *
     * @return string 
     */
    public function getOtrosprestppbg()
    {
        return $this->otrosprestppbg;
    }

    /**
     * Set patrimonioppbg
     *
     * @param string $patrimonioppbg
     * @return PasivoPatrimonioBg
     */
    public function setPatrimonioppbg($patrimonioppbg)
    {
        $this->patrimonioppbg = $patrimonioppbg;

        return $this;
    }

    /**
     * Get patrimonioppbg
     *
     * @return string 
     */
    public function getPatrimonioppbg()
    {
        return $this->patrimonioppbg;
    }

    /**
     * Set totalppbg
     *
     * @param string $totalppbg
     * @return PasivoPatrimonioBg
     */
    public function setTotalppbg($totalppbg)
    {
        $this->totalppbg = $totalppbg;

        return $this;
    }

    /**
     * Get totalppbg
     *
     * @return string 
     */
    public function getTotalppbg()
    {
        return $this->totalppbg;
    }

    /**
     * Set idnegocio
     *
     * @param \ues\peraBundle\Entity\Negocio $idnegocio
     * @return PasivoPatrimonioBg
     */
    public function setIdnegocio(\ues\peraBundle\Entity\Negocio $idnegocio = null)
    {
        $this->idnegocio = $idnegocio;

        return $this;
    }

    /**
     * Get idnegocio
     *
     * @return \ues\peraBundle\Entity\Negocio 
     */
    public function getIdnegocio()
    {
        return $this->idnegocio;
    }
}
