<!--
    resources/views/tags/admin/liste.blade.php
    view de la liste des tags
-->

@extends('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Les tags </h2>
        <p>{{Html::link('admin/tags/create', 'Ajouter un tag')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Tags</td>
                    <td class='actions'></td>
                    <td class='actions'></td>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>
                        <span>{{Html::link('admin/tags/'.$tag->slug.'/edit', 'edit')}}</span>
                    </td>
                    <td>
                        <span>{{Html::link('admin/tags/'.$tag->slug.'/destroy', 'delete')}}</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop
