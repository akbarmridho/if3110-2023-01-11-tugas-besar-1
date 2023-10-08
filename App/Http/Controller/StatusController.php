<?php

namespace App\Http\Controller;

use App\Model\UserAnime;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session\Session;
use Core\Validator\Rules\Enum;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class StatusController extends BaseController
{
    public function updateStatus(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'status' => new StringType(required: true, rules: [new Enum(['WISHLIST', 'WATCHING', 'WATCHED'])])
        ]);

        if ($validated->isError()) {
            Response::status(400);
            return;
        }

        $animeId = (int)$request->getRouteParam('id');
        $userId = Session::$user->id;

        $old = UserAnime::findByUserIdAnimeId($userId, $animeId);

        if (is_null($old)) {
            UserAnime::create($userId, $animeId, $validated->data['status']);
        } else {
            UserAnime::updateStatus($userId, $animeId, $validated->data['status']);
        }
    }

    public function deleteStatus(Request $request)
    {
        $userId = Session::$user->id;
        $animeId = (int)$request->getRouteParam('id');

        UserAnime::remove($userId, $animeId);
    }
}