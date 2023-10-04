<?php

namespace App\Http\Controller;

use Core\Http\Request;
use Core\Base\BaseController;

class AddAnimeController extends BaseController
{
    public function addAnimeView(Request $request)
    {
        render('addanime');
    }

    public function addAnime(Request $request)
    {
        echo 'add anime';
        
    }
}