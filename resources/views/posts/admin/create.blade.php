<!--
    resources/views/posts/admin/create.blade.php
    view du formulaire de création d'un post
-->

@extends ('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Ajouter un post </h2>
        {{Form::open(array('url'=>'admin/posts/store','enctype'=>'multipart/form-data'))}}
        {{Form::token()}}

        <p>
            {{ Form::label('title','Title')}}
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
            {{ Form::label('categorie','Categorie')}}
            {{ Form::select('categorie',$cats)}}
        </p>
        <p>
            {{ Form::label('image','Image')}}
            {{ Form::file('image')}}
        </p>
        @if($errors->first('image'))
        <span class="error">{{$errors->first('image')}}</span>
        @endif
        <p>
            {{ Form::label('text','Texte')}}
            {{ Form::textarea('text',old('text'))}}
        </p>
        @if($errors->first('text'))
        <span class="error">{{$errors->first('text')}}</span>
        @endif

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->

@stop