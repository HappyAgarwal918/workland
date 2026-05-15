<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.dashboard');
        }
        return view('desktop.employer.dashboard');
    }

    public function searchGuide(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.guide-request');
        }
        return view('desktop.employer.search-guide');
    }

    public function bookingGuide(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.guide-request');
        }
        return view('desktop.employer.booking-guide');
    }

    public function guideDetail(Request $request)
    {
        return view('desktop.employer.guide-detail');
    }

    public function guideRequest(Request $request)
    {
        return view('desktop.employer.guide-request');
    }

    public function message(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.message');
        }
        return view('desktop.employer.message');
    }

    public function addBranches(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.add-branches');
        }
        return view('desktop.employer.add-branches');
    }

    public function upcomingBooking(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.upcoming-tour');
        }
        return view('desktop.employer.upcoming-booking');
    }

    public function outgoingBooking(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.outgoing-tour');
        }
        return view('desktop.employer.outgoing-booking');
    }

    public function paymentHistory(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.payment-history');
        }
        return view('desktop.employer.payment-history');
    }

    public function myProfile(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.profile');
        }
        return view('desktop.employer.my-profile');
    }

    public function travelGuide(Request $request)
    {
        return view('mobile-first.employer.travel-guide');
    }

    public function branchesList(Request $request)
    {
        return view('mobile-first.employer.branches-list');
    }

    public function calendar(Request $request)
    {
        if ($request->attributes->get('isMobile')) {
            return view('mobile-first.employer.calender');
        }
        return view('desktop.employer.dashboard');
    }
}
