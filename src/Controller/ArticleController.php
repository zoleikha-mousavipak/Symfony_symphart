<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        // return new Response("Helooooo");
        // using twig

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

      /**
     * @Route("/article/{id}", name="article_show")
     * @Method({"GET"})
     */
    public function show($id)
    {
        // return new Response("Helooooo");
        // using twig

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }


    // /**
    //  * @Route("/article/save")
    //  */

    // public function save()
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $article = new Article();
    //     $article->setTitle('Article Two');
    //     $article->setBody('Body for article Two');

    //     $entityManager->persist($article);

    //     $entityManager->flush();

    //     return new Response('Saves an article with this id: ' . $article->getId());
    // }
}
