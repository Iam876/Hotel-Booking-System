<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

         // Check if the user is an admin and already logged in
    if($request->user()->role === 'admin' && $request->session()->has('authenticated_as_admin')) {
        return redirect('/admin/dashboard');
    }

    // Set authenticated_as_admin flag in session for admin users
    if($request->user()->role === 'admin') {
        $request->session()->put('authenticated_as_admin', true);
    }

    // $url = '';
    // if($request->user()->role === 'admin'){
    //     $url = '/admin/dashboard';
    // } elseif($request->user()->role === 'user'){
    //     $url = '/dashboard';
    // }

    $url = $request->user()->role === 'admin' ? '/admin/dashboard' : '/dashboard';

    // return redirect()->intended($url);

        // $urlPath = '';
        // if($request->user()->role === 'admin'){
        //     $urlPath = '/admin/dashboard';
        // } elseif($request->user()->role === 'user'){
        //     $urlPath = '/dashboard';
        // }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
