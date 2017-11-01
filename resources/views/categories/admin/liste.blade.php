<!--
    resources/views/categories/admin/liste.blade.php
    view de la liste des catégories
-->

@extends('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Les categories </h2>
        <p>{{Html::link('admin/categories/create', 'Ajouter une categorie')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Categories</td>
                    <td class='actions'></td>
                    <td class='actions'></td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <span>{{Html::link('admin/categories/'.$category->slug.'/edit', 'edit')}}</span>
                    </td>
                    <td>
                        <span>{{Html::link('admin/categories/'.$category->slug.'/destroy', 'delete')}}</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop
