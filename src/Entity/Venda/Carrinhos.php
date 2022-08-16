<?php

namespace Entity\Venda;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrinho
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Carrinho
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
     * @ORM\OneToMany(targetEntity="Produtos", cascade="persist")
     * @ORM\JoinColumn(name="produtos", referencedColumnName="id")
     * */
    private $produtos;


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
     * @ORM\PrePersist
     */
    public function emCriacao()
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
