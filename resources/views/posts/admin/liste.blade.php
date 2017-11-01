<!--
    resources/views/posts/admin/liste.blade.php
    view de la liste des posts
-->

@extends('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Les posts </h2>
        <p>{{Html::link('admin/posts/create', 'Ajouter un post')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Titre</td>
                    <td>Categorie</td>
                    <td class='actions'></td>
                    <td class='actions'></td>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>
                        <span>{{Html::link('admin/posts/'.$post->slug.'/edit', 'edit')}}</span>
                    </td>
                    <td>
                        <span>{{Html::link('admin/posts/'.$post->slug.'/destroy', 'delete')}}</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop
