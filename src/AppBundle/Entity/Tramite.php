<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Tramite
 *
 * @ORM\Table(name="tramite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TramiteRepository")
 */
class Tramite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="zerbikatkodea", type="string", length=255,nullable=true)
     */
    private $zerbikatkodea;

    /**
     * @var bool
     *
     * @ORM\Column(name="isResolved", type="boolean", nullable=true)
     */
    private $isResolved;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     * @Gedmo\Blameable(on="change", field={"title", "body"})
     */
    private $contentChangedBy;

    /*****************************************************************************************************************/
    /*** ERLAZIOAK ***************************************************************************************************/
    /*****************************************************************************************************************/

    /**
     * @var \AppBundle\Entity\Arreta
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Arreta", inversedBy="tramiteak")
     * @ORM\JoinColumn(name="arreta_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $arreta;

    /**
     * @var \AppBundle\Entity\Mota
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mota", inversedBy="tramiteak")
     * @ORM\JoinColumn(name="mota_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $mota;

    /**
     * @var \AppBundle\Entity\Result
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Result", inversedBy="tramiteak")
     * @ORM\JoinColumn(name="result_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $result;


    /**
     * Constructor.
     */
    public function __construct()
    {

    }

    public function __toString()
    {
        return $this->getName();
    }

    /*****************************************************************************************************************/
    /*****************************************************************************************************************/
    /*****************************************************************************************************************/



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
     * Set isResolved
     *
     * @param boolean $isResolved
     *
     * @return Tramite
     */
    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    /**
     * Get isResolved
     *
     * @return boolean
     */
    public function getIsResolved()
    {
        return $this->isResolved;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Tramite
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Tramite
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Tramite
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set contentChangedBy
     *
     * @param string $contentChangedBy
     *
     * @return Tramite
     */
    public function setContentChangedBy($contentChangedBy)
    {
        $this->contentChangedBy = $contentChangedBy;

        return $this;
    }

    /**
     * Get contentChangedBy
     *
     * @return string
     */
    public function getContentChangedBy()
    {
        return $this->contentChangedBy;
    }

    /**
     * Set arreta.
     *
     * @param \AppBundle\Entity\Arreta|null $arreta
     *
     * @return Tramite
     */
    public function setArreta(\AppBundle\Entity\Arreta $arreta = null)
    {
        $this->arreta = $arreta;

        return $this;
    }

    /**
     * Get arreta.
     *
     * @return \AppBundle\Entity\Arreta|null
     */
    public function getArreta()
    {
        return $this->arreta;
    }

    /**
     * Set mota.
     *
     * @param \AppBundle\Entity\Mota|null $mota
     *
     * @return Tramite
     */
    public function setMota(\AppBundle\Entity\Mota $mota = null)
    {
        $this->mota = $mota;

        return $this;
    }

    /**
     * Get mota.
     *
     * @return \AppBundle\Entity\Mota|null
     */
    public function getMota()
    {
        return $this->mota;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Tramite
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set zerbikatkodea.
     *
     * @param string $zerbikatkodea
     *
     * @return Tramite
     */
    public function setZerbikatkodea($zerbikatkodea)
    {
        $this->zerbikatkodea = $zerbikatkodea;

        return $this;
    }

    /**
     * Get zerbikatkodea.
     *
     * @return string
     */
    public function getZerbikatkodea()
    {
        return $this->zerbikatkodea;
    }

    /**
     * Set result.
     *
     * @param \AppBundle\Entity\Result|null $result
     *
     * @return Tramite
     */
    public function setResult(\AppBundle\Entity\Result $result = null)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result.
     *
     * @return \AppBundle\Entity\Result|null
     */
    public function getResult()
    {
        return $this->result;
    }
}
