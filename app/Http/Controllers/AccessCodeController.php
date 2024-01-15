<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessCodeController extends Controller
{
    public function index()
    {
        return view('accesscode');
    }

    public function checkAccess(Request $request)
    {
        $inputCode = $request->input('access_code');
        $storedCode = config('app.access_code');

        if ($inputCode === $storedCode) {
            return redirect('/accueil');
        } else {
            return back()->withErrors(['access_code' => 'Invalid access code']);
        }
    }

}
