<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/mini_blog', name: 'ajout_blog')]
    public function ajoutBlog(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $titre = $request->request->get('Titre');
            $description = $request->request->get('Description');

            $article = new Article();
            $article->setTitre($titre);
            $article->setDescription($description);

            $entityManager->persist($article);
            $entityManager->flush();

        }

        return $this->render('mini_blog/ajout_blog.html.twig');
    }

    #[Route('/mini_blog', name: 'afficher_blog')]
    public function afficherBlog(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $descriptionCom = $request->request->get('commentaire');
                $commentaire = new Commentaire();
                $commentaire->setDescriptionCom($descriptionCom);
                $entityManager->persist($commentaire);
                $entityManager->flush();
        }
        $query = $entityManager->createQuery('SELECT a FROM App\Entity\Article a'); 
        $articles = $query->getResult();
        return $this->render('mini_blog/afficher_article.html.twig', [ 'articles' => $articles, ]);
    }
    
}
