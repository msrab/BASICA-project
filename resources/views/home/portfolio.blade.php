<!--
    resources/views/home/portfolio.blade.php
    view de la liste des works récents
-->

<!-- Our Portfolio -->

<div class="section section-white">
    <div class="container">
        <div class="row">

            <div class="section-title">
                <h1>Our Recent Works</h1>
            </div>


            <ul class="grid cs-style-3">
                @include('works.list')
            </ul>
        </div>
    </div>
</div>
<!-- Our Portfolio -->