<!--
    resources/views/works/admin/liste.blade.php
    view de la liste des works
-->

@extends('layouts.admin')

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Les works </h2>
        <p>{{Html::link('admin/works/create', 'Ajouter un work')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Titre</td>
                    <td>Tags</td>
                    <td class='actions'></td>
                    <td class='actions'></td>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $work)
                <tr>
                    <td>{{$work->name}}</td>
                    <td>
                        @php $virgules = count($work->tags)-1 @endphp
                        @foreach($work->tags as $tag)
                        {{$tag->name}}
                        @if($virgules > 0)
                        ,
                        @endif
                        @php $virgules-- @endphp
                        @endforeach
                    </td>
                    <td>
                        <span>{{Html::link('admin/works/'.$work->slug.'/edit', 'edit')}}</span>
                    </td>
                    <td>
                        <span>{{Html::link('admin/works/'.$work->slug.'/destroy', 'delete')}}</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->
@stop
