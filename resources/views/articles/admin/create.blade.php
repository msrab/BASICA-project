<!--
    resources/views/articles/admin/create.blade.php
    view du formulaire de création d'un article
-->

@extends('layouts.admin')

@section('contenu')
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Ajouter un article </h2>
        {{Form::open(array('url'=>'admin/articles/store','enctype'=>'multipart/form-data'))}}
        {{Form::token()}}

        <p>
            {{ Form::label('title','Titre')}}
            {{ Form::text('title', old('title'))}}
        </p>
        @if($errors->first('title'))
        <span class="error">{{$errors->first('title')}}</span>
        @endif
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', old('slug'))}}
        </p>
        @if($errors->first('slug'))
        <span class="error">{{$errors->first('slug')}}</span>
        @endif
        <p>
            {{ Form::label('subtitle','Sous-titre')}}
            {{ Form::text('subtitle', old('subtitle'))}}
        </p>
        @if($errors->first('subtitle'))
        <span class="error">{{$errors->first('subtitle')}}</span>
        @endif

        <p>
            {{ Form::label('text','Texte')}}
            {{ Form::textarea('text',old('text'))}}
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
            {{ Form::checkbox('slide',old('slide'))}}
        </p>

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop