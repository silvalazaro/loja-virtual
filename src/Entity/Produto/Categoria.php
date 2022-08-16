<?php

namespace App\Entity\Produto;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 */
class Categoria
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;


    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private ?string $nome = null;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="criado_em", type="datetime")
     */
    private $criadoEm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="atualizadoEm", type="datetime")
     */
    private $atualizadoEm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluida", type="boolean", nullable=true)
     */
    private $excluido;

 
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $nome
     * @return Category
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param \DateTime $criadoEm
     * @return Category
     */
    public function setCriadoEm($criadoEm)
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
     * @param \DateTime $atualizadoEm
     * @return Category
     */
    public function setAtualizadoEm($atualizadoEm)
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAtualizadoEm()
    {
        return $this->atualizadoEm;
    }

    /**
     * @param boolean $excluido
     * @return Category
     */
    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExcluido()
    {
        return $this->excluido;
    }

    /**
     * @ORM\PrePersist
     */
    public function onCreate()
    {
        $this->setCriadoEm(new \DateTime());
        $this->setAtualizadoEm(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function emAtualizacao()
    {
        $this->setAtualizadoEm(new \DateTime());
    }

}
