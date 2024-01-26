<section id="produits">
    <div class="product-slider">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                <div class="text-container">
                    <h2>{{ $product->title }}</h2>
                    <p>{{ $product->is_bio ? 'Bio' : 'Non-bio' }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <button class="slick-prev">&#10094;</button>
    <button class="slick-next">&#10095;</button>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.product-slider').slick({
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
