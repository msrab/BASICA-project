<!--
    resources/views/home/slider.blade.php
    view du slider des articles
-->

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        @php $slides = count($articles) @endphp
        <div class="carousel-inner">
            @foreach($articles as $article)
            
            <div class="item {!! ($slides == count($articles)) ? 'active' : '' !!}" style="background-image: url({{Request::root().'/'.$article->image}})">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="animation animated-item-1">{{$article->title}}</h2>
                                <p class="animation animated-item-2">{{$article->subtitle}}</p>
                                <br>
                                <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            @php $slides-- @endphp
            @endforeach
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->