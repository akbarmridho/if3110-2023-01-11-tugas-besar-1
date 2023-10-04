<?php

namespace App\Http\Controller;

use App\Model\Anime;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Rules\Enum;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class AnimeController extends BaseController
{
    public function index(Request $request)
    {
        $user = Session::$user;

        $validated = Validator::validate($request->getQueryData(), [
            'genre' => new StringType(false, false, [
                new Enum(array_merge(['all'], Anime::$genres))
            ]),
            'status' => new StringType(false, false, [
                new Enum(['all', 'WISHLIST', 'WATCHING', 'WATCHED'])
            ]),
            'sort_by' => new StringType(false, false, [
                new Enum(['members', 'rating', 'air_date_start'])
            ]),
            'search_by' => new StringType(false, false, [
                new Enum(['title', 'studio'])
            ]),
            'sort' => new StringType(false, false, [
                new Enum(['asc', 'desc'])
            ]),
            'q' => new StringType(false, false),
            'page' => new IntType(false, false, [], true)
        ]);

        $result = Anime::findAll(
            is_null($user) ? null : $user->id,
            ...$validated->data
        );

        render('index', [
            'data' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => array_key_exists('page', $validated->data) ? $validated->data['page'] : 1
        ]);
    }

    public function view(Request $request)
    {
        echo "Anime dengan id " . $request->getRouteParam('id');
    }
}
