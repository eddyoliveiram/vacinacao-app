<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalFuncionarios' => 100,
            'totalVacinas' => 50,
            'vacinasAtrasadas' => 5,
        ];

        return view('dashboard.index', compact('data'));
    }
    public function reports()
    {

    }

}
