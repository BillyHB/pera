<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivoBg
 *
 * @ORM\Table(name="activo_bg", uniqueConstraints={@ORM\UniqueConstraint(name="activo_bg_pk", columns={"id"})}, indexes={@ORM\Index(name="relationship_13_fk", columns={"idnegocio"})})
 * @ORM\Entity
 */
class ActivoBg
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="activo_bg_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibleabg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $disponibleabg;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentasxcobrarabg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $cuentasxcobrarabg;
    
    /**
     * @var string
     *
     * @ORM\Column(name="inventariosabg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $inventariosabg;
    
    /**
     * @var string
     *
     * @ORM\Column(name="activofijoabg", type="decimal", precision=9, scale=2, nullable=false)
     */
    private $activofijoabg;

    /**
     * @var string
     *
     * @ORM\Column(name="totalabg", type="decimal", precision=9, scale=2, nullable=true)
     */
    private $totalabg;

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
     * Set disponibleabg
     *
     * @param string $disponibleabg
     * @return ActivoBg
     */
    public function setDisponibleabg($disponibleabg)
    {
        $this->disponibleabg = $disponibleabg;

        return $this;
    }

    /**
     * Get disponibleabg
     *
     * @return string 
     */
    public function getDisponibleabg()
    {
        return $this->disponibleabg;
    }

    /**
     * Set cuentasxcobrarabg
     *
     * @param string $cuentasxcobrarabg
     * @return ActivoBg
     */
    public function setCuentasxcobrarabg($cuentasxcobrarabg)
    {
        $this->cuentasxcobrarabg = $cuentasxcobrarabg;

        return $this;
    }

    /**
     * Get cuentasxcobrarabg
     *
     * @return string 
     */
    public function getCuentasxcobrarabg()
    {
        return $this->cuentasxcobrarabg;
    }
    
    /**
     * Set inventariosabg
     *
     * @param string $inventariosabg
     * @return ActivoBg
     */
    public function setInventariosabg($inventariosabg)
    {
        $this->inventariosabg = $inventariosabg;

        return $this;
    }

    /**
     * Get inventariosabg
     *
     * @return string 
     */
    public function getInventariosabg()
    {
        return $this->inventariosabg;
    }
    
    /**
     * Set activofijoabg
     *
     * @param string $activofijoabg
     * @return ActivoBg
     */
    public function setActivofijoabg($activofijoabg)
    {
        $this->activofijoabg = $activofijoabg;

        return $this;
    }

    /**
     * Get activofijoabg
     *
     * @return string 
     */
    public function getActivofijoabg()
    {
        return $this->activofijoabg;
    }

    /**
     * Set totalabg
     *
     * @param string $totalabg
     * @return ActivoBg
     */
    public function setTotalabg($totalabg)
    {
        $this->totalabg = $totalabg;

        return $this;
    }

    /**
     * Get totalabg
     *
     * @return string 
     */
    public function getTotalabg()
    {
        return $this->totalabg;
    }

    /**
     * Set idnegocio
     *
     * @param \ues\peraBundle\Entity\Negocio $idnegocio
     * @return ActivoBg
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
