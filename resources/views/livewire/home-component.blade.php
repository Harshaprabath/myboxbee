<div>
<title>Home</title>
<style>
   
</style>

<diV class="c_body">
<section>    
    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <section
            style="
        padding: 15px 0;
        text-align: center;
        width: 350px;
        position: absolute;
        bottom: 15px;
        left: 0;
        right: 0%;
        z-index: 1;
        justify-content: center;
        display: flex;
        margin: auto;"
            class="build">
            <div>
                <a href="/collections/gift-box-builder-gifts"
                    style="letter-spacing: 7px;;text-align: center;font-size: 20px;">Build a Gift Box</a>
            </div>
        </section>
        <div class="carousel-inner" style="height: 500px;">
            @if ($slider->isEmpty())
                <div class="carousel-item active">
                    <div
                        style="width: auto;height: 600px;background-position-y: center;background-size: cover;background-image: url({{ asset('assets/images/slider1.jpg') }}">
                        <div
                            style="background: rgba(0, 0, 0, 0.5);color: #f1f1f1;width: 100%; padding: 20px;height: 100%;">
                            <div style="color: white;padding: 171px 30px;max-width: 620px;margin: auto;">
                                <h1>BOXFOX Does Bridal</h1>
                                <p style="font-size: 1.53846em;">From engagement gifts o bridesmaid asks, and shower
                                    gifts to newlywed care packages - we've gott it all!</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @else
        @foreach ($slider as $slide)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div
                    style="width: auto;height: 600px;background-position-y: center;background-size: cover;background-image: url({{ asset('upload/frontend') }}/{{ $slide->image }});">
                    <div style="background: rgba(0, 0, 0, 0.5);color: #f1f1f1;width: 100%; padding: 20px;height: 100%;">
                        <div style="color: white;padding: 171px 30px;max-width: 620px;margin: auto;text-align: center;">
                            <h1>BOXFOX Does Bridal</h1>
                            <p style="font-size: 1.53846em;">From engagement gifts o bridesmaid asks, and shower
                                gifts to newlywed care packages - we've gott it all!</p>

                        </div>
                    </div>
                </div>

            </div>
        @endforeach
        @endif

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</section>


<section class="section1" data-aos="fade-up">
    <div class="container">
        <div class="row d-fle" style="display: flex;justify-content: center;">
            <div>
                <h4 style="font-size: 30px;font-weight: bold;color: black;">YOU GO-TO FOR GIFTING</h4>
            </div>
        </div>
        <div style="text-align: center;font-size: 16px;font-weight: 500;color: black;">
            <p style="font-size: 1.5rem">Women owned. We've made gifting effortless & elevated since 2014.</p>
            <p style="font-size: 1.5rem">No post oddice lines & no kitsch. We promise.</p>
        </div>
    </div>
</section>
<section style="background-color:#FDF0E2;" class="section1" data-aos="fade-up">
    <div class="container">
        <div class="row mb-5">
            <div>
                <p class="fs-lg">HOW IT WORKS</p>
            </div>
        </div>
        <div class="row ">
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
<section>
    <div class="p-5">
        <div class="row scrollme" >
            <div class="col-md-6 position-relative">
                @if ($middle1->isEmpty())
                    <img src="{{ asset('assets/images/slider3.jpg') }}" alt="" srcset="">
                @else
                <div class=" " >
                    <div class="skew-image animateme " data-when="enter"
                    data-from="0"
                    data-to="1"
                    data-easing="easeinout"
                    data-rotatez="10"></div>
                </div>
                    <img class="skew-image"  src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                    <img class="skew-image" src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                    <img class="skew-image" src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                    <img class="skew-image" src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                @endif
            </div>
            <div class="col-md-6" data-aos="fade-right">
                
                <div class="">
                    <h1 class="mb-5 c_cardtitle" >For The Snow Lover</h1>
                    <p > Curated dot your friend who can't
                        wait to slopes this ski( and snowbord!) season. Whether they're ready for balck diamond or just
                        there for the apres, we've got the perfect gifts just for them.</p>
                    <a href="/collections/gift-box-builder-gifts" class="btn">Make your box!</a>

                </div>

            </div>
        </div>
    </div>
</section>
<section class="mt-5">
    <div class="p-5">
        <div class="row " >
            <div class="col-md-6 " data-aos="fade-right">
              
                <div class="">
                    <h1 class="mb-5 c_cardtitle" >For The Snow Lover</h1>
                    <p >
                        Curated dot your friend who can't wait to slopes this ski( and snowbord!) season. Whether
                        they're ready for balck diamond or just there for the apres, we've got the perfect gifts just
                        for them.
                    </p>
                    <a href="/collections/gift-box-builder-gifts" class="btn">Make your box!</a>
                </div>
            </div>

            <div class="col-md-6 position-relative scrollme">
                @if ($middle1->isEmpty())
                    <img src="{{ asset('assets/images/slider2.jpg') }}" alt="" srcset="">
                @else

                    <img class="rotate-three-img animateme" data-when="enter"
                    data-from="0"
                    data-to="1"
                    data-easing="easeinout"
                    data-rotatez="-10"  src="{{ asset('upload/frontend/') }}/{{ $middle1[0]->image }}" alt="">
                    <img class="rotate-three-img animateme" data-when="enter"
                    data-from="0"
                    data-to="1"
                    data-easing="easeinout"
                    data-rotatez="10"  src="{{ asset('upload/frontend/') }}/{{ $middle1[0]->image }}" alt="">
                    <img class="rotate-three-img animateme" data-when="enter"
                    data-from="0"
                    data-to="1"
                    data-easing="easeinout"
                    data-rotatez="-10"  src="{{ asset('upload/frontend/') }}/{{ $middle1[0]->image }}" alt="">
                @endif
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="p-5">
        <div class="row" style="background-color:#FDF0E2 ;margin-top: -22px;" data-aos="fade-right">
            <div class="col-md-6">
                @if ($middle1->isEmpty())
                    <img src="{{ asset('assets/images/slider3.jpg') }}" alt="" srcset="">
                @else
                    <img src="{{ asset('upload/frontend/') }}/{{ $middle2[0]->image }}" alt="">
                @endif
            </div>
            <div class="col-md-6" style="padding: 70px;text-align: left;color: #000;" data-aos="fade-right">
                <div class="">
                    <span style="font-size: 30px;"><i>gift guide</i></span>
                    <h2><i>INSPIRATION: APRES</i></h2>
                </div>
                <div class="item-gap">
                    <h6 class="mb-5" style="font-size: 20px;">For The Snow Lover</h6>
                    <p style="font-size: 13px;line-height: 22px;margin-top: 20px;"> Curated dot your friend who can't
                        wait to slopes this ski( and snowbord!) season. Whether they're ready for balck diamond or just
                        there for the apres, we've got the perfect gifts just for them.</p>
                    <a href="/collections/gift-box-builder-gifts/box" class="btn">Make your box!</a>

                </div>

            </div>
        </div>
    </div>
</section>
<section>
    <div class="row" style="background-color:#FDF0E2 ;margin-top: -20px;">
        <div class="col-md-6" style="padding: 70px;text-align: left;color: #000;" data-aos="fade-left">
            <div class="">
                <span style="font-size: 30px;"><i>gift guide</i></span>
                <h2><i>INSPIRATION: APRES</i></h2>
            </div>
            <div class="item-gap">
                <h6 class="mb-5" style="font-size: 20px;">For The Snow Lover</h6>
                <p style="font-size: 13px;line-height: 22px;margin-top: 20px;"> Curated dot your friend who can't
                    wait to slopes this ski( and snowbord!) season. Whether they're ready for balck diamond or just
                    there for the apres, we've got the perfect gifts just for them.</p>
                <a href="/collections/gift-box-builder-gifts/box" class="btn">Make your box!</a>

            </div>
        </div>

        <div class="col-md-6" data-aos="fade-right">
            @if ($middle1->isEmpty())
                <img src="{{ asset('assets/images/slider4.jpg') }}" alt="" srcset="">
            @else
                <img src="{{ asset('upload/frontend/') }}/{{ $middle3[0]->image }}" alt="">
            @endif

        </div>
    </div>
</section>
<section class="section1" data-aos="fade-up">
    <div class="container">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="text-center">
                <h4 class="mb-5" style="font-size: 30px;font-weight: bold;color: black;">THE MARKETPLACE</h4>
                <h5 style="font-size: 30px;">GIFT FOR THEM & SHOP FOR YOU</h5>
            </div>
        </div>
    </div>
</section>
<section class="mt-5 ">
    <div class="p-5">
        <div class="row " style="background-color:#FDF0E2 ;margin-top: -1px;">
            <div class="col-md-6" style="padding: 70px;text-align: left;color: #000;"data-aos="fade-right">
                <div class="">
                    <span style="font-size: 30px;"><i>gift guide</i></span>
                    <h2><i>INSPIRATION: APRES</i></h2>
                </div>

                <div class="item-gap">
                    <h6 class="mb-5" style="font-size: 20px;">For The Snow Lover</h6>

                    <p style="font-size: 13px;line-height: 22px;margin-top: 20px;"> Curated dot your friend who can't
                        wait to slopes this ski( and snowbord!) season. Whether they're ready for balck diamond or just
                        there for the apres, we've got the perfect gifts just for them.</p>
                    <a href="/collections/gift-box-builder-gifts/box" class="btn">Make your box!</a>

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
</section> -->
<section data-aos="flip-up">
    <div style="text-align: center;">
        <h4 class="sub1">AS SEEN IN</h4>
    </div>

    <div class="row logobr" style="margin-top: -20px;">
        @if ($partner->isEmpty())
            <div class="col-md-2">
                <img src="{{ asset('assets/images/l1.webp') }}" alt="" srcset="">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/l2.webp') }}" alt="" srcset="">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/l3.webp') }}" alt="" srcset="">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/l4.webp') }}" alt="" srcset="">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/l5.webp') }}" alt="" srcset="">
            </div>
        @else
            @foreach ($partner as $part)
                <div class="col-md-2">
                    <img src="{{ asset('upload/frontend') }}/{{ $part->image }}" alt="">
                </div>
            @endforeach
        @endif

    </div>
</section>
{{-- <section>
    <div style="text-align: center;" class="container">
        <h4 class="sub1">Featured Collections</h4>
        <div class="row section1" style="text-align: start;display: block;margin:0 20px;padding-top: 20px">
            @if ($fetuers->isEmpty())
                <div class="col-md-3 c_col-md-3">
                    <img src="{{ asset('assets/images/slider4.jpg') }}" alt="" srcset="">
                    <h5>Text</h5>
                    <div>
                        <p>Description</p>
                    </div>
                </div>
            @else
                @foreach ($fetuers as $f)
                    <div class="col-2 col-md-3 c_col-md-3">
                        <div class="box c_box">
                            <img src="{{ asset('upload/frontend') }}/{{ $f->image }}" alt="">
                            <h5>{{ $f->title }}</h5>
                            <div>
                                <p>{{ $f->discription }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>
</section> --}}

<section>
    <div class="container">
        <h4 class="text-left mb-4">Featured Collections</h4>
        <div class="row">
            @if ($fetuers->isEmpty())
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">text</h5>
                                <p class="card-text">discription</p>
                            </div>
                    </div>
                </div>
            @else
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
           @endif
        </div>
    </div>
</section>
</div>
</div>