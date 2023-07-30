<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterType;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $userCount = User::count();
        $unitCount = Unit::count();
        $letterTypeCount = LetterType::count();

        $filter = (object) [
            'status' => 'Surat Masuk',
        ];
        $incomingLetterCount = Letter::filter($filter)->count();

        $filter = (object) [
            'status' => 'Surat Keluar',
        ];
        $outcomingLetterCount = Letter::filter($filter)->count();

        return view('new-dashboard', compact('userCount', 'unitCount', 'letterTypeCount', 'incomingLetterCount', 'outcomingLetterCount'));
    }
}
