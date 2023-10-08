<?php

namespace App\Http\Controller;

use App\Model\Review;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class ReviewController extends BaseController
{
    public function addReviewView(Request $request)
    {
        render('addreview', ['id' => $request->getRouteParam('id')]);
    }

    public function addReview(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'review' => new StringType(required: true),
            'rating' => new IntType(required: true, shouldCast: true),
        ]);

        if ($validated->isError()) {
            render('addreview', ['id' => $request->getRouteParam('id')]);
        } else {
            $reviewData = $validated->data;
            $reviewData['anime_id'] = $request->getRouteParam('id');
            $reviewData['user_id'] = Session::$user->id;

            $rowCount = Review::create($reviewData);
            if ($rowCount == 0) {
                render('addreview', ['error' => 'Failed to add review']);
            } else {
                Session::setMessage('Review added successfully');
                redirect('anime/' . $request->getRouteParam('id'));
            }
        }
    }

    public function editReviewView(Request $request)
    {
        // todo:   
    }

    public function editReview(Request $request)
    {
        // todo:
    }

    public function deleteReview(Request $request)
    {
        // todo:
    }
}