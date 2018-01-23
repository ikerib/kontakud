<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Arreta
 *
 * @ORM\Table(name="arreta")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArretaRepository")
 */
class Arreta
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
     * @var \DateTime
     *
     * @ORM\Column(name="fetxa", type="datetime")
     */
    private $fetxa;

    /**
     * @var string
     *
     * @ORM\Column(name="nan", type="string", length=255)
     */
    private $nan;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=255, nullable=true)
     */
    private $remitente;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255, nullable=true)
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="adina", type="string", length=255, nullable=true)
     */
    private $adina;

    /**
     * @var string
     *
     * @ORM\Column(name="nazionalitatea", type="string", length=255, nullable=true)
     */
    private $nazionalitatea;

    /**
     * @var string
     *
     * @ORM\Column(name="hizkuntza", type="string", length=255, nullable=true)
     */
    private $hizkuntza;

    /**
     * @var string
     *
     * @ORM\Column(name="barrutia", type="string", length=255, nullable=true)
     */
    private $barrutia;

    /**
     * @var string
     *
     * @ORM\Column(name="administrazioa", type="string", length=255, nullable=true)
     */
    private $administrazioa;

    /**
     * @var string
     *
     * @ORM\Column(name="oharra",type="text",nullable=true)
     */
    private $oharra;

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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="arretak")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;


    /**
     * @var tramiteak[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tramite", mappedBy="arreta",cascade={"persist"})
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $tramiteak;

    /**
     * @var \AppBundle\Entity\Kanala
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Kanala")
     * @ORM\JoinColumn(name="kanala_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $kanala;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->tramiteak = new ArrayCollection();
    }

    public function __toString()
    {
        return $this-getNan();
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
     * Set fetxa
     *
     * @param \DateTime $fetxa
     *
     * @return Arreta
     */
    public function setFetxa($fetxa)
    {
        $this->fetxa = $fetxa;

        return $this;
    }

    /**
     * Get fetxa
     *
     * @return \DateTime
     */
    public function getFetxa()
    {
        return $this->fetxa;
    }

    /**
     * Set nan
     *
     * @param string $nan
     *
     * @return Arreta
     */
    public function setNan($nan)
    {
        $this->nan = $nan;

        return $this;
    }

    /**
     * Get nan
     *
     * @return string
     */
    public function getNan()
    {
        return $this->nan;
    }

    /**
     * Set remitente
     *
     * @param string $remitente
     *
     * @return Arreta
     */
    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return string
     */
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Arreta
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set adina
     *
     * @param string $adina
     *
     * @return Arreta
     */
    public function setAdina($adina)
    {
        $this->adina = $adina;

        return $this;
    }

    /**
     * Get adina
     *
     * @return string
     */
    public function getAdina()
    {
        return $this->adina;
    }

    /**
     * Set nazionalitatea
     *
     * @param string $nazionalitatea
     *
     * @return Arreta
     */
    public function setNazionalitatea($nazionalitatea)
    {
        $this->nazionalitatea = $nazionalitatea;

        return $this;
    }

    /**
     * Get nazionalitatea
     *
     * @return string
     */
    public function getNazionalitatea()
    {
        return $this->nazionalitatea;
    }

    /**
     * Set hizkuntza
     *
     * @param string $hizkuntza
     *
     * @return Arreta
     */
    public function setHizkuntza($hizkuntza)
    {
        $this->hizkuntza = $hizkuntza;

        return $this;
    }

    /**
     * Get hizkuntza
     *
     * @return string
     */
    public function getHizkuntza()
    {
        return $this->hizkuntza;
    }

    /**
     * Set barrutia
     *
     * @param string $barrutia
     *
     * @return Arreta
     */
    public function setBarrutia($barrutia)
    {
        $this->barrutia = $barrutia;

        return $this;
    }

    /**
     * Get barrutia
     *
     * @return string
     */
    public function getBarrutia()
    {
        return $this->barrutia;
    }

    /**
     * Set administrazioa
     *
     * @param string $administrazioa
     *
     * @return Arreta
     */
    public function setAdministrazioa($administrazioa)
    {
        $this->administrazioa = $administrazioa;

        return $this;
    }

    /**
     * Get administrazioa
     *
     * @return string
     */
    public function getAdministrazioa()
    {
        return $this->administrazioa;
    }

    /**
     * Set oharra
     *
     * @param string $oharra
     *
     * @return Arreta
     */
    public function setOharra($oharra)
    {
        $this->oharra = $oharra;

        return $this;
    }

    /**
     * Get oharra
     *
     * @return string
     */
    public function getOharra()
    {
        return $this->oharra;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Arreta
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
     * @return Arreta
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
     * @return Arreta
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Arreta
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
