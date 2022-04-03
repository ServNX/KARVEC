@extends('layout.main')

@section('page')
Portfolio
@endsection

@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Check our Portfolio</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                @for($x=1; $x <= 28; $x++)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="/images/portfolio/{{$x}}.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Image {{$x}}</h4>
                        <p>App</p>
                        <a href="/images/portfolio/{{$x}}.jpg" data-gallery="portfolioGallery"
                           class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
@endsection
