<?php

namespace App\DataFixtures\Produto;

use App\Entity\Produto\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriaFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $categorias = ["Higiene", "Limpeza", "Organizador", "Cozinha"];

        foreach($categorias as $nomeCategoria){
            $categoria = new Categoria();
            $categoria->setNome($nomeCategoria);
            $manager->persist($categoria);
        }
        $manager->flush();

    }
}
