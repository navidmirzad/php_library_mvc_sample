<?php

namespace App\Controllers;

use Core\View;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;

class Books extends \Core\Controller
{
    public function indexAction(): void
    {
        $books = Book::getAll();
        View::render('Books/index.php', [
            'pageTitle' => 'Books',
            'books' => $books
        ]);
    }

    public function newAction(): void
    {
        $authors = Author::getAll();
        $publishers = Publisher::getAll();
        View::render('Books/new.php', [
            'pageTitle' => 'Add Book',
            'authors' => $authors,
            'publishers' => $publishers
        ]);
    }

    public function createAction(): void
    {
       $result = Book::create($_POST);

       if (is_array($result)) {
            $authors = Author::getAll();
            $publishers = Publisher::getAll();
            View::render('Books/new.php', [
                'pageTitle' => 'Add Book',
                'authors' => $authors,
                'publishers' => $publishers,
                'validationErrors' => $result
            ]);        
        } else {
            $_SESSION['message'] = 'Book succesfully created';
            header('Location: ' . \App\Config::BASE_URL . 'books');
        }   
    }
    
}