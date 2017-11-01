<!--
    resources/views/posts/posts.blade.php
    view de la page des posts
-->

@foreach($posts as $post)
<!-- Blog Post Excerpt -->
<div class="col-sm-6">
    <div class="blog-post blog-single-post">
        <div class="single-post-title">
            <h2>{{$post->title}}</h2>
        </div>

        <div class="single-post-image">
            <img src="{{Request::root().'/'.$post->image}}" alt="{{$post->title}}">
        </div>

        <div class="single-post-info">
            <i class="glyphicon glyphicon-time"></i>{{Carbon\Carbon::parse($post->created_at)->format('d M, Y')}} <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
        </div>

        <div class="single-post-content">
            <p>
                {{Str::words($post->text,70)}}
            </p>
            <a href="{{URL::to('posts/'.$post->slug)}}" class="btn">Read more</a>
        </div>
    </div>
</div>
<!-- End Blog Post Excerpt -->
@endforeach

<!-- Pagination -->

@php $i = 1 @endphp
<div class="pagination-wrapper">
    <ul class="pagination pagination-sm">
        <li class=" {!! ($page == 1) ? 'disabled' : '' !!} "><a href="{{URL::to('posts')}}?page={{ $i }}">Previous</a></li>

        @for($i = 1; $i <= $pages; $i++)
        <li class=" {!! ($i == $page) ? 'active' : '' !!} ">
            <a href="{{URL::to('posts')}}?page={{$i}}">{{$i}}</a>
        </li>
        @endfor
        @php $i = 1 @endphp
        <li class=" {!! ($page == $pages) ? 'disabled' : '' !!} "><a href="{{URL::to('posts')}}?page={{ $i+1 }}">Next</a></li>
    </ul>

</div>