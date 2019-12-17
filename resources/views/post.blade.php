@extends('layouts.app')

@section('head_title', $options['blogname'])
@section('wordpress_title', $options['blogname'])
@if($post)
    @section('site_heading_title', $post->title)
@section('site_subheading_title', $subhead)
@else
    @section('site_heading_title', '404')
@section('site_subheading_title', 'Elemento no encontrado')
@endif
@if($post->attachment->isEmpty())
    @section('header_background_image', 'img/home-bg.jpg')
@else
    @section('header_background_image', $post->attachment->first()->guid)
@endif
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @if($post)
                    <div class="post-preview">
                        <p>
                            {!! $post->content !!}
                        </p>
                        @if (!$post->comments->isEmpty())
                            <h3>Comentarios</h3>
                            @foreach($post->comments as $comentario)
                                <hr>
                                <p>Publicado por <a href="{{$comentario->comment_author_url}}">{{$comentario->comment_author}}</a>
                                    el día
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comentario->comment_date_gmt)->setTimezone('Europe/Madrid')->format('d/m/Y') }}
                                    a las
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comentario->comment_date_gmt)->setTimezone('Europe/Madrid')->format('H:i') }}
                                </p>
                                <p>
                                    {!! $comentario->comment_content !!}
                                </p>
                            @endforeach
                        @endif
                    </div>
                @endif
            </div>
        </div>
@endsection
