<!--
    resources/views/articles/admin/liste.blade.php
    view de la liste des articles
-->

@extends('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Les articles </h2>
        <p>{{Html::link('admin/articles/create', 'Ajouter un article')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Titre</td>
                    <td>Slide</td>
                    <td class='actions'></td>
                    <td class='actions'></td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    @if($article->slide == 1) 
                        <td>oui</td>
                        @else 
                        <td>non</td>
                        @endif
                    
                    <td>
                        <span>{{Html::link('admin/articles/'.$article->slug.'/edit', 'edit')}}</span>
                    </td>
                    <td>
                        <span>{{Html::link('admin/articles/'.$article->slug.'/destroy', 'delete')}}</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop
