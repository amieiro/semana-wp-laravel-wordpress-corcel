@extends('layouts.app')

@section('head_title', $options['blogname'])
@section('wordpress_title', $options['blogname'])
@section('site_heading_title', $options['blogname'])
@section('site_subheading_title', $options['blogdescription'])
@section('header_background_image', 'img/home-bg.jpg')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{ url($post->slug) }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                        </a>
                        <p class="post-meta">Publicado
                            @if ($post->author)
                                por {{ $post->author->display_name }}
                            @endif
                            el
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->post_modified_gmt)->setTimezone('Europe/Madrid')->format('d/m/Y') }}
                        </p>
                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                    <hr>
            @endforeach
            <!-- Pager -->
                <div class="clearfix">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
