<?php

namespace App\Http\Controllers;

use Corcel\Model\Menu;
use Corcel\Model\Option;
use Corcel\Model\Post;
use Illuminate\Http\Request;

class WordpressController extends Controller
{
    public function index() {
        $menu = Menu::slug('menu-principal')->first();
        $posts = Post::status('publish')->type('post')->newest()->paginate(5);
        $options = Option::asArray();

        return view('index', compact('menu', 'posts', 'options'));
    }
}
