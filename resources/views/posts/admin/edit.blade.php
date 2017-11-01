<!--
    resources/views/posts/admin/edit.blade.php
    view du formulaire d'édition d'un post
-->

@extends('layouts.admin')

@section('contenu')
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Editer un post </h2>
        {{Form::open(array('url'=>'admin/posts/update','enctype'=>'multipart/form-data'))}}
        {{Form::token()}}

        {{ Form::hidden('id',$post->id)}}
        <p>
            {{ Form::label('title','Titre')}}
            {{ Form::text('title', isset($post->title) ? $post->title : old('title'))}}
        </p>
        @if($errors->first('title'))
        <span class="error">{{$errors->first('title')}}</span>
        @endif
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', isset($post->slug) ? $post->slug : old('slug'))}}
        </p>
        @if($errors->first('slug'))
        <span class="error">{{$errors->first('slug')}}</span>
        @endif
        <p>
            {{ Form::label('categorie','Categorie')}}
            {{ Form::select('categorie',$cats,$post->category_id)}}
        </p>
        <p>
            {{ Form::label('text','Texte')}}
            {{ Form::textarea('text', isset($post->text) ? $post->text : old('text'))}}
        </p>
        <p>
            {{ Form::label('image','Image')}}
            {{ Form::file('image')}}
        </p>
        @if($errors->first('image'))
        <span class="error">{{$errors->first('image')}}</span>
        @endif

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop