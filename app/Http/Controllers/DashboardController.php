<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
    
    public function index() {
        
        $menus = Menu::all();

        return view('dashboard', compact('menus'));
    
    }

}
