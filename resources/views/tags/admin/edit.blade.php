<!--
    resources/views/tags/admin/edit.blade.php
    view du formulaire d'édition d'un tag
-->

@extends ('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Editer un tag </h2>
        {{Form::open(array('url'=>'admin/tags/update'))}}
        {{Form::token()}}
        {{ Form::hidden('id',$tag->id)}}
        
        <p>
            {{ Form::label('name','Nom')}}
            {{ Form::text('name', isset($tag->name) ? $tag->name : old('name'))}}
        </p>
        @if($errors->first('name'))
        <span class="error">{{$errors->first('name')}}</span>
        @endif
        
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', isset($tag->slug) ? $tag->slug : old('slug'))}}
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