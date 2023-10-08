<?php

namespace App\Http\Controller;

use App\Model\Anime;
use App\Model\Review;
use App\Model\UserAnime;
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

    public function search(Request $request)
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
            'q' => new StringType(false, false)
        ]);

        $result = Anime::findAll(
            is_null($user) ? null : $user->id,
            ...$validated->data
        );

        render_component('anime-list/list', [
            'data' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => 1
        ]);
    }

    public function view(Request $request)
    {
        $id = (int)$request->getRouteParam('id');
        render('animedetail', [
                'anime' => Anime::findById($id),
                'user_anime' => Session::isAuthenticated() ? UserAnime::findByUserIdAnimeId(Session::$user->id, $id) : null,
                'user_review' => Session::isAuthenticated() ? Review::findByUserIdAnimeId(Session::$user->id, $id) : null,
                'reviews' => Review::findByAnimeId($id)
            ]
        );
    }
}
