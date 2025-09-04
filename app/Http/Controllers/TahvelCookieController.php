<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Http;

class TahvelCookieController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        //https://tahvel.edu.ee/hois_back/user

        $response = Http::withHeaders([
            'cookie' => $request->tahvel_cookie,
        ])->get('https://tahvel.edu.ee/hois_back/user');

        if(! $response->ok() || empty($response->body())) {
            return redirect()->back()->withErrors([
                'tahvel_cookie' => 'Invalid Tahvel cookie. Please make sure you copied the entred cookie'
            ]);
        }

        $request->user()->update([
            'tahvel_cookie' => $request->tahvel_cookie
        ]);
        return redirect()->to(route('dashboard'));
    }
}