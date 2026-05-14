<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function dashboard()
    {
        return view('welcome');
    }

    public function Edashboard()
    {
        return view('welcome');
    }

    public function Gdashboard()
    {
        return view('welcome');
    }
}
