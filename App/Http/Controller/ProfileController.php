<?php

namespace App\Http\Controller;

use App\Model\User;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Validator\Rules\Enum;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class ProfileController extends BaseController
{
    public function index(Request $request)
    {
        $validated = Validator::validate($request->getQueryData(), [
            'id' => new IntType(true),
            'name' => new StringType(true),
            'username' => new StringType(true),
            'bio' => new StringType(nullable: true),
            'role' => new StringType(true, false, [new Enum(['USER', 'ADMIN'])])
        ]);

        $result = User::findById($validated->data['id']);

        render('index', [
            'data' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => array_key_exists('page', $validated->data) ? $validated->data['page'] : 1
        ]);
    }

    public function view(Request $request)
    {
        render('profile', [
            'user' => User::findById($request->getRouteParam('id')),
            'stats' => User::getStatistics($request->getRouteParam('id'))
        ]);
    }
}
