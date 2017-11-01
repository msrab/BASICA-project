<!--
    resources/views/tags/admin/create.blade.php
    view du formulaire de création d'un tag
-->

@extends ('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Ajouter un tag </h2>
        {{Form::open(array('url'=>'admin/tags/store'))}}
        {{Form::token()}}

        <p>
            {{ Form::label('name','Nom')}}
            {{ Form::text('name', old('name'))}}
        </p>
        @if($errors->first('name'))
        <span class="error">{{$errors->first('name')}}</span>
        @endif
        
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', old('slug'))}}
        </p>
        @if($errors->first('slug'))
        <span class="error">{{$errors->first('slug')}}</span>
        @endif

        
        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->

@stop