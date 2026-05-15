<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        return view('frontend.home');
    }

    public function aboutUs(Request $request)
    {
        return view('frontend.about-us');
    }

    public function contactUs(Request $request)
    {
        return view('frontend.contact-us');
    }

    public function pricing(Request $request)
    {
        return view('frontend.pricing');
    }

    public function map(Request $request)
    {
        return view('frontend.map');
    }

    public function blogs(Request $request)
    {
        return view('frontend.blogs');
    }

    public function employerLogin(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('auth.mobile.employer-login');
        }
        return view('auth.employer-login');
    }

    public function employerRegister(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('auth.mobile.employer-register');
        }
        return view('auth.employer-register');
    }

    public function guideLogin(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('auth.mobile.guide-login');
        }
        return view('auth.guide-login');
    }

    public function guideRegister(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('auth.mobile.guide-register');
        }
        return view('auth.guide-register');
    }
}
