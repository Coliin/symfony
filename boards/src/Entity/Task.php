<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="idStory", columns={"idStory"})})
 * @ORM\Entity
 */
class Task
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
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \Story
     *
     * @ORM\ManyToOne(targetEntity="Story")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStory", referencedColumnName="id")
     * })
     */
    private $idstory;

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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \Story
     */
    public function getIdstory()
    {
        return $this->idstory;
    }

    /**
     * @param \Story $idstory
     */
    public function setIdstory($idstory)
    {
        $this->idstory = $idstory;
    }


}
