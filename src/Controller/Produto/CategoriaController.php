<?php

namespace App\Controller\Produto;

use App\Service\Produto\CategoriaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    private CategoriaService $service;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->service = $categoriaService;
    }

    /**
     * @Route("/categoria", name="app_categoria")
     */
    public function index(): Response
    {
        return $this->render('categoria/index.html.twig', [
            'categorias' => $this->service->obterTodasAsCategorias()
        ]);
    }

}
