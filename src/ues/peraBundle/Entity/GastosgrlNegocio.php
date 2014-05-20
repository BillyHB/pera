<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GastosgrlNegocio
 *
 * @ORM\Table(name="gastosgrl_negocio", uniqueConstraints={@ORM\UniqueConstraint(name="gastosgrl_negocio_pk", columns={"id"})}, indexes={@ORM\Index(name="relationship_12_fk", columns={"idnegocio"})})
 * @ORM\Entity
 */
class GastosgrlNegocio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gastosgrl_negocio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sueldosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $sueldosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="alquileresggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $alquileresggn;

    /**
     * @var string
     *
     * @ORM\Column(name="serviciosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $serviciosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="transporteggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $transporteggn;

    /**
     * @var string
     *
     * @ORM\Column(name="bodegaggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $bodegaggn;

    /**
     * @var string
     *
     * @ORM\Column(name="impuestosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $impuestosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="cuotaptmosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $cuotaptmosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosgastosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $otrosgastosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="imprevistosggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $imprevistosggn;

    /**
     * @var string
     *
     * @ORM\Column(name="totalggn", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalggn;

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
     * Set sueldosggn
     *
     * @param string $sueldosggn
     * @return GastosgrlNegocio
     */
    public function setSueldosggn($sueldosggn)
    {
        $this->sueldosggn = $sueldosggn;

        return $this;
    }

    /**
     * Get sueldosggn
     *
     * @return string 
     */
    public function getSueldosggn()
    {
        return $this->sueldosggn;
    }

    /**
     * Set alquileresggn
     *
     * @param string $alquileresggn
     * @return GastosgrlNegocio
     */
    public function setAlquileresggn($alquileresggn)
    {
        $this->alquileresggn = $alquileresggn;

        return $this;
    }

    /**
     * Get alquileresggn
     *
     * @return string 
     */
    public function getAlquileresggn()
    {
        return $this->alquileresggn;
    }

    /**
     * Set serviciosggn
     *
     * @param string $serviciosggn
     * @return GastosgrlNegocio
     */
    public function setServiciosggn($serviciosggn)
    {
        $this->serviciosggn = $serviciosggn;

        return $this;
    }

    /**
     * Get serviciosggn
     *
     * @return string 
     */
    public function getServiciosggn()
    {
        return $this->serviciosggn;
    }

    /**
     * Set transporteggn
     *
     * @param string $transporteggn
     * @return GastosgrlNegocio
     */
    public function setTransporteggn($transporteggn)
    {
        $this->transporteggn = $transporteggn;

        return $this;
    }

    /**
     * Get transporteggn
     *
     * @return string 
     */
    public function getTransporteggn()
    {
        return $this->transporteggn;
    }

    /**
     * Set bodegaggn
     *
     * @param string $bodegaggn
     * @return GastosgrlNegocio
     */
    public function setBodegaggn($bodegaggn)
    {
        $this->bodegaggn = $bodegaggn;

        return $this;
    }

    /**
     * Get bodegaggn
     *
     * @return string 
     */
    public function getBodegaggn()
    {
        return $this->bodegaggn;
    }

    /**
     * Set impuestosggn
     *
     * @param string $impuestosggn
     * @return GastosgrlNegocio
     */
    public function setImpuestosggn($impuestosggn)
    {
        $this->impuestosggn = $impuestosggn;

        return $this;
    }

    /**
     * Get impuestosggn
     *
     * @return string 
     */
    public function getImpuestosggn()
    {
        return $this->impuestosggn;
    }

    /**
     * Set cuotaptmosggn
     *
     * @param string $cuotaptmosggn
     * @return GastosgrlNegocio
     */
    public function setCuotaptmosggn($cuotaptmosggn)
    {
        $this->cuotaptmosggn = $cuotaptmosggn;

        return $this;
    }

    /**
     * Get cuotaptmosggn
     *
     * @return string 
     */
    public function getCuotaptmosggn()
    {
        return $this->cuotaptmosggn;
    }

    /**
     * Set otrosgastosggn
     *
     * @param string $otrosgastosggn
     * @return GastosgrlNegocio
     */
    public function setOtrosgastosggn($otrosgastosggn)
    {
        $this->otrosgastosggn = $otrosgastosggn;

        return $this;
    }

    /**
     * Get otrosgastosggn
     *
     * @return string 
     */
    public function getOtrosgastosggn()
    {
        return $this->otrosgastosggn;
    }

    /**
     * Set imprevistosggn
     *
     * @param string $imprevistosggn
     * @return GastosgrlNegocio
     */
    public function setImprevistosggn($imprevistosggn)
    {
        $this->imprevistosggn = $imprevistosggn;

        return $this;
    }

    /**
     * Get imprevistosggn
     *
     * @return string 
     */
    public function getImprevistosggn()
    {
        return $this->imprevistosggn;
    }

    /**
     * Set totalggn
     *
     * @param string $totalggn
     * @return GastosgrlNegocio
     */
    public function setTotalggn($totalggn)
    {
        $this->totalggn = $totalggn;

        return $this;
    }

    /**
     * Get totalggn
     *
     * @return string 
     */
    public function getTotalggn()
    {
        return $this->totalggn;
    }

    /**
     * Set idnegocio
     *
     * @param \ues\peraBundle\Entity\Negocio $idnegocio
     * @return GastosgrlNegocio
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
