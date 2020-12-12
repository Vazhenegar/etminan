@php
$NewProductsSection=collect($IndexContents)->where('section','new_products');
$SectionTitle=$NewProductsSection->where('element_title','section_title')->pluck('element_content')->first();
$BtnNewProducts=$NewProductsSection->where('element_title','btn_title')->pluck('element_content')->first();
$NewProducts
@endphp


<section class="portfolio_teasers_wrapper">
    <div class="container triangles-of-section">
        <div class="triangle-up-left"></div>
        <div class="square-left"></div>
        <div class="triangle-up-right"></div>
        <div class="square-right"></div>
    </div>
    <div class="container">
        <h2 class="section_header fancy centered">{{ $SectionTitle }}</h2>
        <div class="portfolio_strict row">

            @foreach($NewProducts as $key=>$item)

            <div class="col-sm-4 col-md-4">
                <div class="portfolio_item wow fadeInUp"><a href="portfolio_item.html">
                        <figure style="background-image:url({{$item['image']}})">
                            <figcaption>
                                <div class="portfolio_description">
                                    <h3>{{$item['title_'.app()->getLocale()]}}</h3>
                                </div>
                            </figcaption>
                        </figure>
                    </a></div>
            </div>

            @endforeach

        </div>
        <div class="centered_button"><a class="btn btn-primary" href="portfolio.html">{{ $BtnNewProducts }}</a></div>
    </div>
</section>
