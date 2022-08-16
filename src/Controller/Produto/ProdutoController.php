<?php
namespace App\Controller\Produto;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    #[Route('/produtos')]
    public function obterTodos(): Response
    {
        $number = random_int(0, 100);

        return $this->render('produto/index.html.twig', [
          
        ]);
    }

}