<?php

namespace App\Http\Controllers;

use Corcel\Model\Menu;
use Illuminate\Http\Request;

class WordpressController extends Controller
{
    public function index() {
        $menu = Menu::slug('menu-principal')->first();
        return view('index', compact('menu'));
    }
}
