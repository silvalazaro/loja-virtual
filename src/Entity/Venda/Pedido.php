<?php

namespace Entity\Venda;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Pedido
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
     * @return \DateTime
     */
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
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
     * @return \DateTime
     */
    public function getAtualizadoEm()
    {
        return $this->atualizadoEm;
    }

    /**
     *
     * @ORM\PrePersist
     */
    public function emCriacao()
    {
        $this->setCriadoEm(new \DateTime());
        $this->setAtualizadoEm(new \DateTime());
    }

    /**
     *
     * @ORM\PreUpdate
     */
    public function emAtualizacao()
    {
        $this->setAtualizadoEm(new \DateTime());
    }

   
}