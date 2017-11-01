<!--
    resources/views/posts/show.blade.php
    view de la page de détails d'un post
-->

@extends('layouts.default')

@section('contenu')
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Post</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Blog Post -->
            <div class="col-sm-8">
                <div class="blog-post blog-single-post">
                    <div class="single-post-title">
                        <h2>{{$post->title}}</h2>
                    </div>

                    <div class="single-post-image">
                        <img src="{{Request::root().'/'.$post->image}}" alt="{{$post->title}}">
                    </div>
                    <div class="single-post-info">
                        <i class="glyphicon glyphicon-time"></i>{{Carbon\Carbon::parse($post->created_at)->format('d M, Y')}} <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
                    </div>
                    <div class="single-post-content">
                        <h3>{{$post->title}}</h3>
                        <p>{!! nl2br(e($post->text)) !!}</p>
                    </div>
                </div>
            </div>
            <!-- End Blog Post -->
            <!-- Sidebar -->
            <div class="col-sm-4 blog-sidebar">

                @include('posts.recentPosts')
                @include('posts.list')
                

            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>

@stop
