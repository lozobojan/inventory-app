<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentCategory;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $equipment = Equipment::query()->available()->get();
        $categories = EquipmentCategory::query()
                                        ->whereHas('available_equipment')
                                        ->with('available_equipment')
                                        ->get();
        $tickets = Ticket::query()->open();
        return view('home', compact(['categories']));
    }
}
