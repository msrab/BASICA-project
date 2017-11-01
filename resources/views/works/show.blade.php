<!--
    resources/views/works/show.blade.php
    view de la page de détails d'un work
-->

@extends('layouts.default')

@section('contenu')
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product Details</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Product Image & Available Colors -->
            <div class="col-sm-6">
                <div class="product-image-large">
                    <img src="{{Request::root().'/'.$work->image}}" alt="{{$work->name}}">
                </div>
                <div class="colors">
                    <span class="color-white"></span>
                    <span class="color-black"></span>
                    <span class="color-blue"></span>
                    <span class="color-orange"></span>
                    <span class="color-green"></span>
                </div>
            </div>
            <!-- End Product Image & Available Colors -->
            <!-- Product Summary & Options -->
            <div class="col-sm-6 product-details">
                <h2>{{$work->name}}</h2>
                <h3>Quick Overview</h3>
                <p>{{nl2br(e($work->description))}}</p>
                <h3>Project Details</h3>
                <p><strong>Client: </strong>{{$work->client}}</p>
                <p><strong>Date: </strong>{{Carbon\Carbon::parse($work->created_at)->format('M,d Y')}}</p>
                <p><strong>Tags: </strong>
                    @php $virgules = count($work->tags)-1 @endphp
                    @foreach($work->tags as $tag)
                    {{$tag->name}}
                    @if($virgules > 0)
                    ,
                    @endif
                    @php $virgules-- @endphp
                    @endforeach
                </p>
            </div>
            <!-- End Product Summary & Options -->

        </div>
    </div>
</div>

<hr>

@include('works.similar')
@stop