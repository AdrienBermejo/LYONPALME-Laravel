<section id="partenaire">
    <h1>Nos Partenaires</h1>
    <div class="partenaire-slider">
        @foreach($partners as $partner)
            <div class="partenaire">
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
            </div>
        @endforeach
    </div>

    <button class="slick-prev">&#10094;</button>
    <button class="slick-next">&#10095;</button>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.partenaire-slider').slick({
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
</section>
