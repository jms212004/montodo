<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use Twig\Environment;
use Doctrine\Persistence\ManagerRegistry;

class ArticleController extends AbstractController
{

    

    #[Route('/article', name: 'app_article')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);

        $articles = $repository->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
