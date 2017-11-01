<!--
    resources/views/home/index.blade.php
    view de la page d'accueil
-->

@extends('layouts.default')

@section('contenu')

<!-- SLIDER -->
@if(count($articles) > 0)
@include('home.slider')
@endif


<!-- PORTFOLIO -->
@if(count($works) > 0)
@include('home.portfolio')
@endif

<hr>

<!-- Our Articles -->
<div class="section">
    <div class="container">
        <div class="row">

            <!-- LATEST POSTS -->
            @if(count($posts) > 0)
            @include('home.latestPosts')
            @endif

            <!-- POSTS TWITTER -->
            @include('home.postsTwitter')
        </div>
    </div>
</div>


@stop
