<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $letter = Letter::where('code', $request->q)
            ->first();

        $title = 'Sukema';

        if (!$letter) {
            $letter = null;
        }

        return view('index', compact('letter', 'title'));
    }
}
