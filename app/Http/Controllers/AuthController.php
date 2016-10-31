<?php

namespace App\Http\Controllers;

use App\Classes\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends BaseController
{
    private $availableProviders = [
        'facebook',
    ];

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider)
    {
        $request->session()->set('referer_uri', $request->header('referer', '/'));

        if (!in_array($provider, $this->availableProviders)) {
            abort(404);
        }

        $socialite = Socialite::driver($provider);

        return $socialite->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        if (!in_array($provider, $this->availableProviders)) {
            abort(404);
        }

        $user = Socialite::driver($provider)->user();
        $userData = User::store($user, $provider);

        $request->session()->put('user', $userData);

        return response()->redirectTo($request->session()->get('referer_uri'));
    }
}
