<?php

namespace ues\peraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DptoMunic
 *
 * @ORM\Table(name="dpto_munic", uniqueConstraints={@ORM\UniqueConstraint(name="dpto_munic_pk", columns={"id"})})
 * @ORM\Entity
 */
class DptoMunic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dpto_munic_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomdptodm", type="string", length=13, nullable=false)
     */
    private $nomdptodm;

    /**
     * @var string
     *
     * @ORM\Column(name="nommunicipiodm", type="string", length=50, nullable=false)
     */
    private $nommunicipiodm;



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
     * Set nomdptodm
     *
     * @param string $nomdptodm
     * @return DptoMunic
     */
    public function setNomdptodm($nomdptodm)
    {
        $this->nomdptodm = $nomdptodm;

        return $this;
    }

    /**
     * Get nomdptodm
     *
     * @return string 
     */
    public function getNomdptodm()
    {
        return $this->nomdptodm;
    }

    /**
     * Set nommunicipiodm
     *
     * @param string $nommunicipiodm
     * @return DptoMunic
     */
    public function setNommunicipiodm($nommunicipiodm)
    {
        $this->nommunicipiodm = $nommunicipiodm;

        return $this;
    }

    /**
     * Get nommunicipiodm
     *
     * @return string 
     */
    public function getNommunicipiodm()
    {
        return $this->nommunicipiodm;
    }
}
