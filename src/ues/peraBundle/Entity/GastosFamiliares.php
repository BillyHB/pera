<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GastosFamiliares
 *
 * @ORM\Table(name="gastos_familiares", uniqueConstraints={@ORM\UniqueConstraint(name="gastos_familiares_pk", columns={"idgasfamiliares"})}, indexes={@ORM\Index(name="cliente_gas_fam_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class GastosFamiliares
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gastos_familiares_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="alimentaciongasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $alimentaciongasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="educaciongasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $educaciongasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="alquilergasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $alquilergasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="serviciosgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $serviciosgasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="transportegasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $transportegasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="saludgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $saludgasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="prestamospersgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $prestamospersgasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosgastosgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $otrosgastosgasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="imprevistosgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $imprevistosgasfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="totalgasfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalgasfamiliares;

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
     * Get idgasfamiliares
     *
     * @return integer 
     */
    public function getIdgasfamiliares()
    {
        return $this->idgasfamiliares;
    }

    /**
     * Set alimentaciongasfamiliares
     *
     * @param string $alimentaciongasfamiliares
     * @return GastosFamiliares
     */
    public function setAlimentaciongasfamiliares($alimentaciongasfamiliares)
    {
        $this->alimentaciongasfamiliares = $alimentaciongasfamiliares;

        return $this;
    }

    /**
     * Get alimentaciongasfamiliares
     *
     * @return string 
     */
    public function getAlimentaciongasfamiliares()
    {
        return $this->alimentaciongasfamiliares;
    }

    /**
     * Set educaciongasfamiliares
     *
     * @param string $educaciongasfamiliares
     * @return GastosFamiliares
     */
    public function setEducaciongasfamiliares($educaciongasfamiliares)
    {
        $this->educaciongasfamiliares = $educaciongasfamiliares;

        return $this;
    }

    /**
     * Get educaciongasfamiliares
     *
     * @return string 
     */
    public function getEducaciongasfamiliares()
    {
        return $this->educaciongasfamiliares;
    }

    /**
     * Set alquilergasfamiliares
     *
     * @param string $alquilergasfamiliares
     * @return GastosFamiliares
     */
    public function setAlquilergasfamiliares($alquilergasfamiliares)
    {
        $this->alquilergasfamiliares = $alquilergasfamiliares;

        return $this;
    }

    /**
     * Get alquilergasfamiliares
     *
     * @return string 
     */
    public function getAlquilergasfamiliares()
    {
        return $this->alquilergasfamiliares;
    }

    /**
     * Set serviciosgasfamiliares
     *
     * @param string $serviciosgasfamiliares
     * @return GastosFamiliares
     */
    public function setServiciosgasfamiliares($serviciosgasfamiliares)
    {
        $this->serviciosgasfamiliares = $serviciosgasfamiliares;

        return $this;
    }

    /**
     * Get serviciosgasfamiliares
     *
     * @return string 
     */
    public function getServiciosgasfamiliares()
    {
        return $this->serviciosgasfamiliares;
    }

    /**
     * Set transportegasfamiliares
     *
     * @param string $transportegasfamiliares
     * @return GastosFamiliares
     */
    public function setTransportegasfamiliares($transportegasfamiliares)
    {
        $this->transportegasfamiliares = $transportegasfamiliares;

        return $this;
    }

    /**
     * Get transportegasfamiliares
     *
     * @return string 
     */
    public function getTransportegasfamiliares()
    {
        return $this->transportegasfamiliares;
    }

    /**
     * Set saludgasfamiliares
     *
     * @param string $saludgasfamiliares
     * @return GastosFamiliares
     */
    public function setSaludgasfamiliares($saludgasfamiliares)
    {
        $this->saludgasfamiliares = $saludgasfamiliares;

        return $this;
    }

    /**
     * Get saludgasfamiliares
     *
     * @return string 
     */
    public function getSaludgasfamiliares()
    {
        return $this->saludgasfamiliares;
    }

    /**
     * Set prestamospersgasfamiliares
     *
     * @param string $prestamospersgasfamiliares
     * @return GastosFamiliares
     */
    public function setPrestamospersgasfamiliares($prestamospersgasfamiliares)
    {
        $this->prestamospersgasfamiliares = $prestamospersgasfamiliares;

        return $this;
    }

    /**
     * Get prestamospersgasfamiliares
     *
     * @return string 
     */
    public function getPrestamospersgasfamiliares()
    {
        return $this->prestamospersgasfamiliares;
    }

    /**
     * Set otrosgastosgasfamiliares
     *
     * @param string $otrosgastosgasfamiliares
     * @return GastosFamiliares
     */
    public function setOtrosgastosgasfamiliares($otrosgastosgasfamiliares)
    {
        $this->otrosgastosgasfamiliares = $otrosgastosgasfamiliares;

        return $this;
    }

    /**
     * Get otrosgastosgasfamiliares
     *
     * @return string 
     */
    public function getOtrosgastosgasfamiliares()
    {
        return $this->otrosgastosgasfamiliares;
    }

    /**
     * Set imprevistosgasfamiliares
     *
     * @param string $imprevistosgasfamiliares
     * @return GastosFamiliares
     */
    public function setImprevistosgasfamiliares($imprevistosgasfamiliares)
    {
        $this->imprevistosgasfamiliares = $imprevistosgasfamiliares;

        return $this;
    }

    /**
     * Get imprevistosgasfamiliares
     *
     * @return string 
     */
    public function getImprevistosgasfamiliares()
    {
        return $this->imprevistosgasfamiliares;
    }

    /**
     * Set totalgasfamiliares
     *
     * @param string $totalgasfamiliares
     * @return GastosFamiliares
     */
    public function setTotalgasfamiliares($totalgasfamiliares)
    {
        $this->totalgasfamiliares = $totalgasfamiliares;

        return $this;
    }

    /**
     * Get totalgasfamiliares
     *
     * @return string 
     */
    public function getTotalgasfamiliares()
    {
        return $this->totalgasfamiliares;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return GastosFamiliares
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
