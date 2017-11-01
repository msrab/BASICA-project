<!--
    resources/views/works/index.blade.php
    view de la page des works
-->

@extends('layouts.default')

@section('contenu')
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Portfolio</h1>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>We are leading company</h2>
                <h3>Specializing in Wordpress Theme Development</h3>
                <p>
                    Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id. Donec elementum mi vitae enim fermentum lobortis.
                </p>

            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">

            <ul class="grid cs-style-2 list-works">
                @include('works.list')
            </ul>


        </div>

        <ul class="pager">
            <li><a href="#" id="more">More works</a></li>
        </ul>
    </div>
</div>

@stop

@section('script')
<script>

    var pageSuivante = 1;
    $(document).on('click', '.pager', function(e){
        e.preventDefault();
        
        pageSuivante++;
            
        $.ajax({
            url: 'works',
            dataType: 'json',
            data: {
                page: pageSuivante
            }
        }).done(function(data){
            $('.list-works').append(data);
            if (pageSuivante > {{$pages}} || pageSuivante === {{$pages}}){
                $('#more').remove();
            }
    
        }).fail(function(){
            alert('Les works n\'ont pas pu être chargés!');
        });
    });

</script>
@stop