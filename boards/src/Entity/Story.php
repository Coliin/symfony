<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Story
 *
 * @ORM\Table(name="story", indexes={@ORM\Index(name="idDeveloper", columns={"idDeveloper"}), @ORM\Index(name="idProject", columns={"idProject"})})
 * @ORM\Entity
 */
class Story
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=true)
     */
    private $descriptif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tags", type="text", length=65535, nullable=true)
     */
    private $tags;

    /**
     * @var string|null
     *
     * @ORM\Column(name="step", type="string", length=50, nullable=true)
     */
    private $step;

    /**
     * @var \Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDeveloper", referencedColumnName="id")
     * })
     */
    private $iddeveloper;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProject", referencedColumnName="id")
     * })
     */
    private $idproject;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param null|string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @return null|string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param null|string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return null|string
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param null|string $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return \Developer
     */
    public function getIddeveloper()
    {
        return $this->iddeveloper;
    }

    /**
     * @param \Developer $iddeveloper
     */
    public function setIddeveloper($iddeveloper)
    {
        $this->iddeveloper = $iddeveloper;
    }

    /**
     * @return \Project
     */
    public function getIdproject()
    {
        return $this->idproject;
    }

    /**
     * @param \Project $idproject
     */
    public function setIdproject($idproject)
    {
        $this->idproject = $idproject;
    }


}
