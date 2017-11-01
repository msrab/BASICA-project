<!--
    resources/views/posts/index.blade.php
    view de la page des posts
-->

@extends('layouts.default')

@section('contenu')
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Blog</h1>
            </div>
        </div>
    </div>
</div>

<div class="section section-posts">
    <div class="container">
        <div class="row">
            
            @include('posts.posts')

        </div>
    </div>
</div>

@stop

@section('script')
<script>
    $(window).on('hashchange', function(){
        if(window.location.hash){
            var page = window.location.hash.replace('#', '');
            if(page === Number.NaN || page <=0){
                return false;
            }else{
                getPosts(page);
            }
        }
    });
    
    $(document).on('click', '.pagination a', function(e){
       e.preventDefault();
       page = $(this).attr('href').split('page=')[1];
       getPosts(page);
    });

    function getPosts(page){
        $.ajax({
           url: '?page='+page,
           dataType: 'json'
        }).done(function(data){
            $('.section-posts .container .row').html(data);
            //location.hash = page;
        }).fail(function(){
            alert('Les posts n\'ont pas pu être chargés!');
        });
    }
    
</script>
@stop