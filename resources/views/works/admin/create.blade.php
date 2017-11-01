<!--
    resources/views/works/admin/create.blade.php
    view du formulaire de création d'un work
-->

@extends ('layouts.admin')

@section('style')
{{Html::style('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}
@stop

@section('contenu')
<!-- PAGE -->
<div id="page">
    <div id ="contenuPage" class="container clearfix">	
        <h2>Ajouter un work </h2>
        {{Form::open(array('url'=>'admin/works/store','enctype'=>'multipart/form-data'))}}
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

        <p>
            {{ Form::label('client','Client')}}
            {{ Form::text('client', old('client'))}}
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
            {{ Form::textarea('description',old('description'))}}
        </p>
        @if($errors->first('description'))
        <span class="error">{{$errors->first('description')}}</span>
        @endif

        <p>
            {{-- Form::label('tags','Tags') --}}
            {{-- Form::select('tags',$tags,null,[
                'id' => 'tags',
                'multiple' => 'multiple'
            ]) --}}
            
        </p>

        <p>{{Form::submit('Enregistrer')}}</p>
        {{Form::close()}}
        </table>
    </div> <!-- contenuPage -->
</div> <!-- #page -->

@stop

@section('scripts')
{{Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}
<script>
    $(function () {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
    });


</script>
@stop