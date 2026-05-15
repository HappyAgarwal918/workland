<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.dashboard');
        }
        return view('desktop.guide.dashboard');
    }

    public function manageRequest(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.tour-manage-request');
        }
        return view('desktop.guide.manage-request');
    }

    public function manageRequestView(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.manage-request-view');
        }
        return view('desktop.guide.manage-request-view');
    }

    public function message(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.message');
        }
        return view('desktop.guide.message');
    }

    public function upcomingTourRequest(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.upcoming-tour-request');
        }
        return view('desktop.guide.upcoming-tour-request');
    }

    public function outgoingTourRequest(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.outgoing-tour-request');
        }
        return view('desktop.guide.outgoing-tour-request');
    }

    public function myProfile(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.profile');
        }
        return view('desktop.guide.my-profile');
    }

    public function calendar(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.guide.calender');
        }
        return view('desktop.guide.guide-calender');
    }

    public function travelDetails(Request $request)
    {
        return view('mobile-first.guide.travel-details');
    }

    public function filterPage(Request $request)
    {
        return view('mobile-first.guide.filter-page');
    }
}
