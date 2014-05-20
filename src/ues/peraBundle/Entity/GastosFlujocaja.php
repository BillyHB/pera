<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GastosFlujocaja
 *
 * @ORM\Table(name="gastos_flujocaja", uniqueConstraints={@ORM\UniqueConstraint(name="gastos_flujocaja_pk", columns={"id"})}, indexes={@ORM\Index(name="relationship_16_fk", columns={"idnegocio"})})
 * @ORM\Entity
 */
class GastosFlujocaja
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gastos_flujocaja_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="compramercaderiagfc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $compramercaderiagfc;

    /**
     * @var string
     *
     * @ORM\Column(name="gastosnegociogfc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $gastosnegociogfc;

    /**
     * @var string
     *
     * @ORM\Column(name="gastosfamiliaresgfc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $gastosfamiliaresgfc;

    /**
     * @var string
     *
     * @ORM\Column(name="totalgfc", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalgfc;

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
     * Set compramercaderiagfc
     *
     * @param string $compramercaderiagfc
     * @return GastosFlujocaja
     */
    public function setCompramercaderiagfc($compramercaderiagfc)
    {
        $this->compramercaderiagfc = $compramercaderiagfc;

        return $this;
    }

    /**
     * Get compramercaderiagfc
     *
     * @return string 
     */
    public function getCompramercaderiagfc()
    {
        return $this->compramercaderiagfc;
    }

    /**
     * Set gastosnegociogfc
     *
     * @param string $gastosnegociogfc
     * @return GastosFlujocaja
     */
    public function setGastosnegociogfc($gastosnegociogfc)
    {
        $this->gastosnegociogfc = $gastosnegociogfc;

        return $this;
    }

    /**
     * Get gastosnegociogfc
     *
     * @return string 
     */
    public function getGastosnegociogfc()
    {
        return $this->gastosnegociogfc;
    }

    /**
     * Set gastosfamiliaresgfc
     *
     * @param string $gastosfamiliaresgfc
     * @return GastosFlujocaja
     */
    public function setGastosfamiliaresgfc($gastosfamiliaresgfc)
    {
        $this->gastosfamiliaresgfc = $gastosfamiliaresgfc;

        return $this;
    }

    /**
     * Get gastosfamiliaresgfc
     *
     * @return string 
     */
    public function getGastosfamiliaresgfc()
    {
        return $this->gastosfamiliaresgfc;
    }

    /**
     * Set totalgfc
     *
     * @param string $totalgfc
     * @return GastosFlujocaja
     */
    public function setTotalgfc($totalgfc)
    {
        $this->totalgfc = $totalgfc;

        return $this;
    }

    /**
     * Get totalgfc
     *
     * @return string 
     */
    public function getTotalgfc()
    {
        return $this->totalgfc;
    }

    /**
     * Set idnegocio
     *
     * @param \ues\peraBundle\Entity\Negocio $idnegocio
     * @return GastosFlujocaja
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
