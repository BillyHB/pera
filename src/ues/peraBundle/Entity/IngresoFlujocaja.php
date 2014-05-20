<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IngresoFlujocaja
 *
 * @ORM\Table(name="ingreso_flujocaja", uniqueConstraints={@ORM\UniqueConstraint(name="ingreso_flujocaja_pk", columns={"id"})}, indexes={@ORM\Index(name="relationship_15_fk", columns={"idnegocio"})})
 * @ORM\Entity
 */
class IngresoFlujocaja
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ingreso_flujocaja_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ventacontadoifc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $ventacontadoifc;

    /**
     * @var string
     *
     * @ORM\Column(name="recuentaxcobrarifc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $recuentaxcobrarifc;

    /**
     * @var string
     *
     * @ORM\Column(name="ventascreditoifc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $ventascreditoifc;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosingresosifc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $otrosingresosifc;

    /**
     * @var string
     *
     * @ORM\Column(name="totalifc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalifc;

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
     * Set ventacontadoifc
     *
     * @param string $ventacontadoifc
     * @return IngresoFlujocaja
     */
    public function setVentacontadoifc($ventacontadoifc)
    {
        $this->ventacontadoifc = $ventacontadoifc;

        return $this;
    }

    /**
     * Get ventacontadoifc
     *
     * @return string 
     */
    public function getVentacontadoifc()
    {
        return $this->ventacontadoifc;
    }

    /**
     * Set recuentaxcobrarifc
     *
     * @param string $recuentaxcobrarifc
     * @return IngresoFlujocaja
     */
    public function setRecuentaxcobrarifc($recuentaxcobrarifc)
    {
        $this->recuentaxcobrarifc = $recuentaxcobrarifc;

        return $this;
    }

    /**
     * Get recuentaxcobrarifc
     *
     * @return string 
     */
    public function getRecuentaxcobrarifc()
    {
        return $this->recuentaxcobrarifc;
    }

    /**
     * Set ventascreditoifc
     *
     * @param string $ventascreditoifc
     * @return IngresoFlujocaja
     */
    public function setVentascreditoifc($ventascreditoifc)
    {
        $this->ventascreditoifc = $ventascreditoifc;

        return $this;
    }

    /**
     * Get ventascreditoifc
     *
     * @return string 
     */
    public function getVentascreditoifc()
    {
        return $this->ventascreditoifc;
    }

    /**
     * Set otrosingresosifc
     *
     * @param string $otrosingresosifc
     * @return IngresoFlujocaja
     */
    public function setOtrosingresosifc($otrosingresosifc)
    {
        $this->otrosingresosifc = $otrosingresosifc;

        return $this;
    }

    /**
     * Get otrosingresosifc
     *
     * @return string 
     */
    public function getOtrosingresosifc()
    {
        return $this->otrosingresosifc;
    }

    /**
     * Set totalifc
     *
     * @param string $totalifc
     * @return IngresoFlujocaja
     */
    public function setTotalifc($totalifc)
    {
        $this->totalifc = $totalifc;

        return $this;
    }

    /**
     * Get totalifc
     *
     * @return string 
     */
    public function getTotalifc()
    {
        return $this->totalifc;
    }

    /**
     * Set idnegocio
     *
     * @param \ues\peraBundle\Entity\Negocio $idnegocio
     * @return IngresoFlujocaja
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
