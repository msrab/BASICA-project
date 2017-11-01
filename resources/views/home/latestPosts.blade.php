<!--
    resources/views/home/latestPosts.blade.php
    view de la liste des posts récents
-->

<!-- Featured News -->
<div class="col-sm-6 featured-news">
    <h2>Latest Blog Posts</h2>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-xs-4"><a href="{{URL::to('posts/'.$post->slug)}}"><img src="{{Request::root().'/'.$post->image}}" alt="{{$post->title}}"></a></div>
        <div class="col-xs-8">
            <div class="caption"><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></div>
            <div class="date">{{Carbon\Carbon::parse($post->created_at)->format('d M Y')}} </div>
            <div class="intro">{{Str::words($post->text,17)}} <a href="{{URL::to('posts/'.$post->slug)}}">Read more...</a></div>
        </div>
    </div>
    @endforeach
</div>
<!-- End Featured News -->