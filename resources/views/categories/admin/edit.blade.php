<!--
    resources/views/categories/admin/edit.blade.php
    view du formulaire d'édition d'une catégorie
-->

@extends ('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Editer une categorie </h2>
        {{Form::open(array('url'=>'admin/categories/update'))}}
        {{Form::token()}}
        {{ Form::hidden('id',$category->id)}}
        
        <p>
            {{ Form::label('name','Nom')}}
            {{ Form::text('name', isset($category->name) ? $category->name : old('name'))}}
        </p>
        @if($errors->first('name'))
        <span class="error">{{$errors->first('name')}}</span>
        @endif
        
        <p>
            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug', isset($category->slug) ? $category->slug : old('slug'))}}
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