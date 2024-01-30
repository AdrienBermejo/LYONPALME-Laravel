<section id="cofinanceur">
    @if(count($cofinanceurs) > 0)
        <h1>Nous les remercions pour leur cofinancement</h1>
        <div class="cofinanceur-slider">
            @foreach($cofinanceurs as $cofinanceur)
                <div class="cofinanceur">
                    <img src="{{ asset('storage/' . $cofinanceur->logo) }}" alt="{{ $cofinanceur->name }}">
                </div>
            @endforeach
        </div>

        <button class="slick-prev">&#10094;</button>
        <button class="slick-next">&#10095;</button>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.cofinanceur-slider').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    prevArrow: $('.slick-prev'),
                    nextArrow: $('.slick-next'),
                    infinite: true,
                });
            });
        </script>
    @endif
</section>
