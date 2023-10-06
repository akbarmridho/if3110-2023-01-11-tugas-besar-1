<?php

namespace App\Http\Controller;

use App\Model\User;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Rules\Min;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class AuthController extends BaseController
{
    public function registerView(Request $request)
    {
        render('register');
    }

    public function register(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            "username" => new StringType(true, rules: [new Min(6)]),
            "name" => new StringType(true, rules: [new Min(6)]),
            "password" => new StringType(true, rules: [new Min(6)]),
            "passwordVerify" => new StringType(true, rules: [new Min(6)]),
        ]);

        if (!$validated->isError()) {
            // convert username to lowercase
            $validated->data['username'] = strtolower($validated->data['username']);

            if ($validated->data['password'] !== $validated->data['passwordVerify']) {
                $validated->errorMessages['password'] = ['Password confirmation does not same'];
            }

            if (User::findByUsername($validated->data['username']) !== null) {
                $validated->errorMessages['username'] = ['This username is already taken'];
            }
        }

        if ($validated->isError()) {
            $old = [];

            if (array_key_exists('username', $validated->data)) {
                $old['username'] = $validated->data['username'];
            }

            if (array_key_exists('name', $validated->data)) {
                $old['name'] = $validated->data['name'];
            }

            render('register', [
                'errors' => $validated->errorMessages,
                'old' => $old
            ]);
        } else {

            $password = password_hash($validated->data['password'], PASSWORD_BCRYPT);

            User::create([
                'username' => $validated->data['username'],
                'password' => $password,
                'name' => $validated->data['name']
            ]);

            $user = User::findByUsername($validated->data['username']);

            Session::login($user);
            redirect('');
        }
    }

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
                render('login', ['error' => 'Username or password is incorrect']);
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