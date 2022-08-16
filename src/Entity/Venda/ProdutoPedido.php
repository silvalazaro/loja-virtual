<?php

namespace Entity\Estoque;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoPedido
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 *
 */
class ProdutoPedido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", cascade="persist")
     * @ORM\JoinColumn(name="categoria", referencedColumnname="id")
     * */
    private $categoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $criadoEm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $atualizadoEm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluido", type="boolean")
     */
    private $excluido;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $nome
     *
     * @return Product
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
     *
     * @return Product
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
     *
     * @return Product
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
     *
     * @return Product
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
     *
     * @param \Entity\Estoque\Categoria $categoria
     *
     * @return Product
     */
    public function setCategoria(\Entity\Estoque\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return \AppBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @ORM\PrePersist
     */
    public function emCriacao()
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