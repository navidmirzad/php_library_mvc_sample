<?php

namespace App\Controllers;

use Core\View;
use App\Models\Book;

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
    
}