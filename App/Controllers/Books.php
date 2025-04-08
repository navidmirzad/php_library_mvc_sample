<?php

namespace App\Controllers;

use Core\View;

class Books extends \Core\Controller
{
    public function indexAction(): void
    {
        // just a test data logic should obviously be in Model
        $books = ['Harry potter 2', 'James bond 007', 'Hajime no Ippo'];

        View::render('Books/index.php', [
            'pageTitle' => 'Books',
            'books' => $books
        ]);
    }
    
}