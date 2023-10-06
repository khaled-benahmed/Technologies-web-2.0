<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/list/{var}', name: 'list_author')]
    public function listAuthor($var)
    {
        $authors = array(
            array('id' => 1, 'username' => ' Victor Hugo','email'=> 'victor.hugo@gmail.com', 'nb_books'=> 100),
            array ('id' => 2, 'username' => 'William Shakespeare','email'=>
                'william.shakespeare@gmail.com','nb_books' => 200),
            array('id' => 3, 'username' => ' Taha Hussein','email'=> 'taha.hussein@gmail.com','nb_books' => 300),
        );

        return $this->render("author/list.html.twig",
            array('variable'=>$var,
                'tabAuthors'=>$authors
                ));
    }
    #[Route('/author/{id}', name: 'author_details')]
public function authorDetails($id)
{
    $authors = array(
        array('id' => 1, 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100,'image'=>'imgs/images.jpg'),
        array('id' => 2, 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200,'image'=>'imgs/images.jpg'),
        array('id' => 3, 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300,'image'=>'imgs/images.jpg'),
    );

    
    $authore = null;
    foreach ($authors as $a) {
        if ($a['id'] == $id) {
            $authore = $a;
            break;
        }
    }

    return $this->render('author/showAuthor.html.twig', [
        'author' => $authore,
    ]);
}
}
