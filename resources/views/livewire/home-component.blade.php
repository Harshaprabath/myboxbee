<title>Home</title>

<diV class="c_body">
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/images/spa-banner2.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/spa-banner2.jpg') }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/spa-banner2.jpg') }}" s alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="section1 " data-aos="fade-up">
        <div class="container">
            <div class="row justify-center d-flex">
                <div>
                    <h4 class="heading-style">YOU GO-TO FOR GIFTING</h4>
                </div>
            </div>
            <div class="text-center font-weight-500 color-black">
                <p class="font-size-large">Women owned. We've made gifting effortless &amp; elevated since 2014.</p>
                <p class="font-size-large">No post office lines &amp; no kitsch. We promise.</p>
            </div>
        </div>
    </section>

    <section class="section1" data-aos="fade-up">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <p class="fs-lg">HOW IT WORKS</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 p-4">
                    <h2 class="">1.</h2><br>
                    <h2 class="mb-2">NEED A GIFT?</h2>
                    <p class="fs-md font-20">Any reason. any season.We're here to help keep things thoughtful.</p>
                </div>
                <div class="col-md-4 p-4">
                    <h2 class="">2.</h2><br>
                    <h2 class="mb-2">KEEP IT PERSONAL</h2>
                    <p class="fs-md font-20">Any reason. any season.We're here to help keep things thoughtful.</p>
                </div>
                <div class="col-md-4 p-4">
                    <h2 class="">3.</h2><br>
                    <h2 class="mb-2">WE HANDLE THE REST</h2>
                    <p class="fs-md font-20">Any reason. any season.We're here to help keep things thoughtful.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="p-5">
            <div class="row" data-aos="fade-right">
                <div class="col-md-6">
                    @if ($middle1->isEmpty())
                    <img src="{{ asset('assets/images/slider3.jpg') }}" alt="" srcset="">
                    @else
                    <img src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                    @endif
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="d-flex flex-column justify-content-center align-items-center custom-style-card">
                        <h1 class="mb-5">For The Snow Lover</h1>
                        <p class="text-center"> Curated dot your friend who can't
                            wait to slopes this ski( and snowbord!) season. Whether they're ready for balck diamond or
                            just there for the apres, we've got the perfect gifts just for them.</p>
                        <a href="/collections/gift-box-builder-gifts/box"
                            class="btn btn-outline-danger btn-margin-top btn-rounded">Make your
                            box!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="p-5">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="d-flex flex-column justify-content-center align-items-center custom-style-card">
                        <h1 class="mb-5">For The Snow Lover</h1>
                        <p class="text-center">Curated dot your friend who can't wait to slopes this ski( and snowbord!)
                            season. Whether
                            they're ready for balck diamond or just there for the apres, we've got the perfect gifts
                            just for them.</p>
                        <a href="/collections/gift-box-builder-gifts/box"
                            class="btn btn-outline-danger btn-margin-top btn-rounded">Make your
                            box!</a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    @if ($middle1->isEmpty())
                    <img src="{{ asset('assets/images/slider2.jpg') }}" alt="" srcset="">
                    @else
                    <img src="{{ asset('upload/frontend/') }}/{{ $middle1[0]->image }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h4 class="text-left mb-4">Featured Collections</h4>
            <div class="row">
                @foreach ($fetuers as $f)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('upload/frontend') }}/{{ $f->image }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $f->title }}</h5>
                            <p class="card-text">{{ $f->discription }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
</div>