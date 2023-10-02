<?php

namespace App\Http\Controller;

use Core\Base\BaseController;
use Core\Http\Request;
use App\Model\User;

class HelloController extends BaseController
{
    public function hello(Request $request)
    {
        render('index');
        var_dump(User::findById('1'));
    }
    
    public function helloFern(Request $request)
    {
        echo "Hello, Fern!";
    }

    public function helloName(Request $request)
    {
        $name = $request->getRouteParam("name");
        $age = $request->getRouteParam("age");

        echo "Hello, $name, umur $age tahun";
    }
}