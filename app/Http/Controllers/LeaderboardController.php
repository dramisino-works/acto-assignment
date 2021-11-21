<?php 

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller {

    public function show()
    {
        $results = Game::select('user_name', 
            DB::raw('sum(if(is_user_winner = 1, 1, 0)) as total_wins'),
            DB::raw('sum(user_score) as total_score')
        )
        ->groupBy('user_name')
        ->orderByDesc('total_wins')
        ->orderByDesc('total_score')
        ->get();

        return response($results, 200);
    }
}
