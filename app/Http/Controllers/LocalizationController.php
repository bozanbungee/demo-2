<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (!in_array($request->locale, config('localization.locales'))) {
            abort(400);
        }
        session(['loacalization' => $request->locale]);

        return redirect()->back();
    }
}
