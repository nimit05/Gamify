<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Gamify\Points\PostCreated;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReputationController extends Controller
{
    public function store(Request $request){
        $user = $request->user();

        $res = [
            'subject_id' => '12', 
            'subject_type' => 'Quiz',
            'user' => $user
        ];

        givePoint(new PostCreated($res));

        // dd($user->getPoints());
        return $user;
    }
}
