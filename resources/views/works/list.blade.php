<!--
    resources/views/works/boucle.blade.php
    view de la liste des works
-->

@foreach($works as $work)
<div class="col-md-4 col-sm-6">
    <figure>
        <img src="{{Request::root().'/'.$work->image}}" alt="{{$work->name}}">
        <figcaption>
            <h3>{{$work->name}}</h3>
            <span>{{$work->client}}</span>
            <a href="{{URL::to('works/'.$work->slug)}}">Take a look</a>
        </figcaption>
    </figure>
</div>
@endforeach
