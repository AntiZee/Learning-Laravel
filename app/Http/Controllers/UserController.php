<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;        
    }
    public function login(): Response
    {
        return response()->view('user.login', [
            'title' => 'Login'
        ]);
    }
    public function doLogin(Request $request): RedirectResponse
    {
        $user = $request->input('user');
        $pass = $request->input('pass');
        if (empty($user) || empty($pass)) {
            return response()->view('user.login', [
                'title' => 'Login',
                'error' => 'User or Password is required'
            ]);
        }
        if ($this->userService->login($user, $pass)) {
            $request->session()->put('user', $user);
            return redirect('/');
        }
        return response()->view('user.login', [
            'title' => 'Login',
            'error' => 'User or Password is incorrect'
        ]);
    }
    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}
