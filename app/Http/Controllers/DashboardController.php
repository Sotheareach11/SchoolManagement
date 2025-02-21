<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total = 1 + 1;
        return view('dashboard', [
            'onePlusOne' => $total,
        ]);

        // return view('dashboard', compact('total'));
    }
}
