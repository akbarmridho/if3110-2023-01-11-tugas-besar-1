<?php

namespace App\Http\Controller;

use App\Model\User;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class AuthController extends BaseController
{
    public function loginView(Request $request)
    {
        render('login');
    }

    public function login(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            "username" => new StringType(true),
            "password" => new StringType(true)
        ]);

        if ($validated->isError()) {
            render('login');
        } else {
            $username = $validated->data['username'];
            $password = $validated->data['password'];

            $user = User::findByUsername($username);

            if ($user === NULL || !password_verify($password, $user->password)) {
                echo "wrong password";
                render('login');
            } else {
                Session::login($user);
                redirect('');
            }
        }
    }

    public function logout(Request $request)
    {
        Session::logout();
        redirect('/');
    }
}