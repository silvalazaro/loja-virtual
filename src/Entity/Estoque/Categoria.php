<?php

namespace Entity\Estoque;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Categoria
{
    /**
     * @var integer
     *
     * @ORM\Column(nome="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(nome="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nome="criado_em", type="datetime")
     */
    private $criadoEm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nome="atualizadoEm", type="datetime")
     */
    private $atualizadoEm;

    /**
     * @var boolean
     *
     * @ORM\Column(nome="excluida", type="boolean")
     */
    private $excluido;

 
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Category
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set criadoEm
     *
     * @param \DateTime $criadoEm
     *
     * @return Category
     */
    public function setCriadoEm($criadoEm)
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

    /**
     * Get criadoEm
     *
     * @return \DateTime
     */
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
     * Set atualizadoEm
     *
     * @param \DateTime $atualizadoEm
     *
     * @return Category
     */
    public function setAtualizadoEm($atualizadoEm)
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }

    /**
     * Get atualizadoEm
     *
     * @return \DateTime
     */
    public function getAtualizadoEm()
    {
        return $this->atualizadoEm;
    }

    /**
     * Set excluido
     *
     * @param boolean $excluido
     *
     * @return Category
     */
    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;

        return $this;
    }

    /**
     * Get excluido
     *
     * @return boolean
     */
    public function getExcluido()
    {
        return $this->excluido;
    }

    /**
     * Estableciendo fecha de creación y actualización al crear
     *
     * @ORM\PrePersist
     */
    public function onCreate()
    {
        $this->setCriadoEm(new \DateTime());
        $this->setAtualizadoEm(new \DateTime());
    }

    /**
     * Estableciendo fecha de actualización
     *
     * @ORM\PreUpdate
     */
    public function emAtualizacao()
    {
        $this->setAtualizadoEm(new \DateTime());
    }

   
}