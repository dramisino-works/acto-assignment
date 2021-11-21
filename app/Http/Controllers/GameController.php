<?php 

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;

class GameController extends Controller {

    public function store(StoreGameRequest $request)
    {
        $userScore = request('user.score');
        $computerScore = request('computer.score');

        $game = Game::create([
            'user_name'      => request('user.name'),
            'user_score'     => $userScore,
            'computer_score' => $computerScore,
            'is_user_winner' => $userScore > $computerScore,
        ]);

        return response($game, 201);
    }
}
