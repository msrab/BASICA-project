<!--
    resources/views/articles/admin/edit.blade.php
    view du formulaire d'édition d'un article
-->

@extends('layouts.admin')

@section('contenu')
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Editer un article </h2>
        {{Form::open(array('url'=>'admin/articles/update','enctype'=>'multipart/form-data'))}}
        {{Form::token()}}

        {{ Form::hidden('id',$article->id)}}
        <p>
            {{ Form::label('title','Titre')}}
            {{ Form::text('title', isset($article->title) ? $article->title : old('title'))}}
        </p>
        @if($errors->first('title'))
        <span class="error">{{$errors->first('title')}}</span>
        @endif
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', isset($article->slug) ? $article->slug : old('slug'))}}
        </p>
        @if($errors->first('slug'))
        <span class="error">{{$errors->first('slug')}}</span>
        @endif
        <p>
            {{ Form::label('subtitle','Sous-titre')}}
            {{ Form::text('subtitle', isset($article->subtitle) ? $article->subtitle : old('subtitle'))}}
        </p>
        @if($errors->first('subtitle'))
        <span class="error">{{$errors->first('subtitle')}}</span>
        @endif

        <p>
            {{ Form::label('text','Texte')}}
            {{ Form::textarea('text', isset($article->text) ? $article->text : old('text'))}}
        </p>
        <p>
            {{ Form::label('image','Image')}}
            {{ Form::file('image')}}
        </p>
        @if($errors->first('image'))
        <span class="error">{{$errors->first('image')}}</span>
        @endif
        <p>
            {{ Form::label('slide','Afficher dans le slider')}}
            {!! Form::checkbox('slide',1, ($article->slide === 1) ? true : false)!!}
        </p>

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop