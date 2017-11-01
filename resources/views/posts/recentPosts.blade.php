<!--
    resources/views/posts/recentPosts.blade.php
    view de la liste des posts recents
-->

<h4>Recent Posts</h4>
<ul class="recent-posts">
    @foreach($posts as $post)
    <li><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></li>
    @endforeach
</ul>