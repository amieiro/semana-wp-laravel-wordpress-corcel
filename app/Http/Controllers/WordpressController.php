<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function post($slug)
    {
        $options = Option::asArray();
        $menu = Menu::slug('menu-principal')->first();
        $post = Post::where('post_name', $slug)->first();
        $subhead = 'Publicado';
        if ($post) {
            if ($post->author) {
                $subhead .= ' por ' . $post->author->display_name;
            }
            $subhead .= ' el ' . Carbon::createFromFormat('Y - m - d H:i:s', $post->post_modified_gmt)->format('d / m / Y');
        }
        return view('post', compact('options', 'menu', 'post', 'subhead'));
    }
}
