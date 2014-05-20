<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IngresosFamiliares
 *
 * @ORM\Table(name="ingresos_familiares", uniqueConstraints={@ORM\UniqueConstraint(name="ingresos_familiares_pk", columns={"id"})}, indexes={@ORM\Index(name="cliente_ing_fam_fk", columns={"idcliente"})})
 * @ORM\Entity
 */
class IngresosFamiliares
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ingresos_familiares_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="salariosingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $salariosingfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="alquileresingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $alquileresingfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="remesasingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $remesasingfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="pensionesingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $pensionesingfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosingresosingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $otrosingresosingfamiliares;

    /**
     * @var string
     *
     * @ORM\Column(name="totalingfamiliares", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $totalingfamiliares;

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
     * Set salariosingfamiliares
     *
     * @param string $salariosingfamiliares
     * @return IngresosFamiliares
     */
    public function setSalariosingfamiliares($salariosingfamiliares)
    {
        $this->salariosingfamiliares = $salariosingfamiliares;

        return $this;
    }

    /**
     * Get salariosingfamiliares
     *
     * @return string 
     */
    public function getSalariosingfamiliares()
    {
        return $this->salariosingfamiliares;
    }

    /**
     * Set alquileresingfamiliares
     *
     * @param string $alquileresingfamiliares
     * @return IngresosFamiliares
     */
    public function setAlquileresingfamiliares($alquileresingfamiliares)
    {
        $this->alquileresingfamiliares = $alquileresingfamiliares;

        return $this;
    }

    /**
     * Get alquileresingfamiliares
     *
     * @return string 
     */
    public function getAlquileresingfamiliares()
    {
        return $this->alquileresingfamiliares;
    }

    /**
     * Set remesasingfamiliares
     *
     * @param string $remesasingfamiliares
     * @return IngresosFamiliares
     */
    public function setRemesasingfamiliares($remesasingfamiliares)
    {
        $this->remesasingfamiliares = $remesasingfamiliares;

        return $this;
    }

    /**
     * Get remesasingfamiliares
     *
     * @return string 
     */
    public function getRemesasingfamiliares()
    {
        return $this->remesasingfamiliares;
    }

    /**
     * Set pensionesingfamiliares
     *
     * @param string $pensionesingfamiliares
     * @return IngresosFamiliares
     */
    public function setPensionesingfamiliares($pensionesingfamiliares)
    {
        $this->pensionesingfamiliares = $pensionesingfamiliares;

        return $this;
    }

    /**
     * Get pensionesingfamiliares
     *
     * @return string 
     */
    public function getPensionesingfamiliares()
    {
        return $this->pensionesingfamiliares;
    }

    /**
     * Set otrosingresosingfamiliares
     *
     * @param string $otrosingresosingfamiliares
     * @return IngresosFamiliares
     */
    public function setOtrosingresosingfamiliares($otrosingresosingfamiliares)
    {
        $this->otrosingresosingfamiliares = $otrosingresosingfamiliares;

        return $this;
    }

    /**
     * Get otrosingresosingfamiliares
     *
     * @return string 
     */
    public function getOtrosingresosingfamiliares()
    {
        return $this->otrosingresosingfamiliares;
    }

    /**
     * Set totalingfamiliares
     *
     * @param string $totalingfamiliares
     * @return IngresosFamiliares
     */
    public function setTotalingfamiliares($totalingfamiliares)
    {
        $this->totalingfamiliares = $totalingfamiliares;

        return $this;
    }

    /**
     * Get totalingfamiliares
     *
     * @return string 
     */
    public function getTotalingfamiliares()
    {
        return $this->totalingfamiliares;
    }

    /**
     * Set idcliente
     *
     * @param \ues\peraBundle\Entity\Cliente $idcliente
     * @return IngresosFamiliares
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
