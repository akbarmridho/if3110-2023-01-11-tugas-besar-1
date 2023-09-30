<?php

namespace App\Http\Controller;

use Core\Base\BaseController;
use Core\Http\Request;

class HelloController extends BaseController
{
    public function hello(Request $request)
    {
        view('index');
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