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
        $incomingLetterCount = Letter::filter((object)['status', 'Surat Masuk'])->count();
        $outcomingLetterCount = Letter::filter((object)['status', 'Surat Keluar'])->count();

        return view('new-dashboard', compact('userCount', 'unitCount', 'letterTypeCount', 'incomingLetterCount', 'outcomingLetterCount'));
    }
}
