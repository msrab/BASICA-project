<!--
    resources/views/posts/list.blade.php
    view de la liste des posts
-->

<h4>Categories</h4>
<ul class="blog-categories">
    @foreach($categories as $category)
    <li><a href="{{URL::to('categories/'.$category->slug)}}">{{$category->name}}</a></li>
    @endforeach
</ul>