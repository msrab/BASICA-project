<!--
    resources/views/works/similar.blade.php
    view de la liste des works similaires
-->

<div class="section">
    <div class="container">
        <div class="row">

            <div class="section-title">
                <h1>Similar Works</h1>
            </div>

            <ul class="grid cs-style-2">
                @foreach($works as $work)
                    @include('works.boucle')
                @endforeach
                
                @if($works2 != null)
                @foreach($works2 as $work)
                    @include('works.boucle')
                @endforeach
                @endif
            </ul>


        </div>
    </div>
</div>