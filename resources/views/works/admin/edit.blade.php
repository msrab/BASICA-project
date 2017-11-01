<!--
    resources/views/works/admin/edit.blade.php
    view du formulaire d'édition d'un work
-->

@extends ('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Editer un work </h2>
        {{Form::open(array('url'=>'admin/works/update','enctype'=>'multipart/form-data'))}}
        {{Form::token()}}
        {{ Form::hidden('id',$work->id)}}
        
        <p>
            {{ Form::label('name','Nom')}}
            {{ Form::text('name', isset($work->name) ? $work->name : old('name'))}}
        </p>
        @if($errors->first('name'))
        <span class="error">{{$errors->first('name')}}</span>
        @endif
        
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', isset($work->slug) ? $work->slug : old('slug'))}}
        </p>
        @if($errors->first('slug'))
        <span class="error">{{$errors->first('slug')}}</span>
        @endif

        <p>
            {{ Form::label('client','Client')}}
            {{ Form::text('client', isset($work->client) ? $work->client : old('client'))}}
        </p>
        @if($errors->first('client'))
        <span class="error">{{$errors->first('client')}}</span>
        @endif
        
        <p>
            {{ Form::label('image','Image')}}
            {{ Form::file('image')}}
        </p>
        @if($errors->first('image'))
        <span class="error">{{$errors->first('image')}}</span>
        @endif
        <p>
            {{ Form::label('description','Description')}}
            {{ Form::textarea('description', isset($work->description) ? $work->description : old('description'))}}
        </p>
        @if($errors->first('description'))
        <span class="error">{{$errors->first('description')}}</span>
        @endif

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->

@stop