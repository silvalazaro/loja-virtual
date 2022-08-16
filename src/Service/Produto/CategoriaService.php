<?php

namespace App\Service\Produto;

use App\Repository\Produto\CategoriaRepository;

class CategoriaService
{
    private CategoriaRepository $repository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->repository = $categoriaRepository;
    }

    public function obterTodasAsCategorias()
    {
        return $this->repository->todos();
    }
}
