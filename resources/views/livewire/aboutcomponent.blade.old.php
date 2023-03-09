<title>About</title>
<style>
    .splash-page-section {
        display: block;
        margin: 0 auto;
        padding: 0;
    }

    .splash-page-section .background-white {
        color: #000;
        background-color: #fff;
    }

    .editorial-content {
        position: relative;
        display: flex;
        flex-flow: row wrap;
        align-items: center;
        justify-content: center;
    }

    .editorial-content .editorial-content-image.image-only {
        width: 100%;
    }

    .editorial-content .editorial-content-image img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
    }

    .splash-page-section .background-nude {
        color: #000;
        background-color: #fdf0e2;
    }

    .charge_rabbit,
    .sky-pilot,
    .wrapper {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .editorial-content.text-only .editorial-content-copy {
        width: 100%;
        text-align: center;
    }

    .editorial-content .editorial-content-copy {
        margin: 0;
        width: 50%;
        padding: 80px;
        text-align: left;
    }

    .charge_rabbit::after,
    .sky-pilot::after,
    .wrapper::after {
        content: '';
        display: table;
        clear: both;
    }

    .gallery-images {
        display: block;
        margin: 0;
        padding: 30px 0;
    }

    .gallery-images.large-image-left .gallery-image.primary {
        float: left;
    }

    .gallery-images .gallery-image.primary {
        padding: 0 0 66.666% 0;
        width: 66.666%;
    }

    .gallery-images .gallery-image {
        position: relative;
        float: left;
        padding: 0 0 100% 0;
        width: 100%;
    }

    .gallery-images .gallery-image-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 10px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .gallery-images .gallery-image.secondary {
        padding: 0 0 33.333% 0;
        width: 33.333%;
    }

    .gallery-images-section+.gallery-images-section {
        margin-top: -60px;
    }

    .splash-page-section .background-white {
        color: #000;
        background-color: #fff;
    }

    .splash-page-section .background-nude {
        color: #000;
        background-color: #fdf0e2;
    }

    .splash-page-section .btn-white {
        color: #000;
        background-color: #fff;
    }

    @media only screen and (max-width: 768px) {

        .charge_rabbit,
        .sky-pilot,
        .wrapper {
            padding: 0 30px;
        }
    }
</style>
<div id="shopify-section-landing-page-d" class="shopify-section">
    <div data-section-id="landing-page-d" data-section-type="page">
        <div class="splash-page-section editorial-content-section">
            <div class="section-block background-white">
                <div class="full-width">
                    <div class="editorial-content image-only">
                    @if($about->isEmpty())
                    <div class="editorial-content-image image-only"><img src="{{asset('img/about.jpg')}}" alt="Inspired?"></div>
    @else
    @foreach($about as $c)
    <div class="editorial-content-image image-only"><img src="{{asset('upload/frontend')}}/{{$c->image}}" alt="Inspired?"></div>
    @endforeach
    @endif

                    </div>

                </div>
            </div>
        </div>
        <div class="splash-page-section editorial-content-section">
            <div class="section-block background-nude">
                <div class="wrapper">
                    <div class="editorial-content text-only">
                        <div class="editorial-content-copy">
                            <h3>Behind the BOXFOX</h3>

                            <p>We started BOXFOX in 2014 with a clear mission: to bring gifting into the 21st century—creating stronger relationships through personal gifts, powered by the simplest user experiences.
                                <br><br>
                                After college, a close friend got sick and we realized the lack of options for being “there” for her when we couldn't be physically. We wanted something that went beyond flowers and the typical overpriced (and wasteful) gift basket. Our standards were high: we wanted something presentable, personal, and with purposeful product that was simple to send. As we explored this need, we discovered that others wanted a modern and seamless gifting experience, too. <br><b>It didn't exist, so we built it. </b>
                                <br><br>
                                Almost 7 years later, our e-commerce site lets customers either pick a thematic, expertly curated option or build the perfect gift box for any occasion through our proprietary BUILD A BOXFOX platform. Whether personal or corporate, we top each gift with a handwritten note and ship around the world.

                                While modern technology powers our business, it’s also why our world needs companies like ours.
                                <br><br>
                                Our approach to business is centered around honoring and maintaining our most important relationships in a tangible way. We’re committed to making elevated gifting an accessible, affordable, and everyday option for our loyal customers and building a business our employees are proud and happy to come to everyday.
                                <br><br>
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="splash-page-section gallery-images-section">
            <div class="section-block background-white">
                <div class="wrapper">
                    <div class="gallery-images large-image-left">
                        <div class="gallery-image primary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A2007_Cropped_1_1400x.jpg?v=1543544988);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A2007_Cropped_1_1400x.jpg?v=1543544988">
                            </div>
                        </div>
                        <div class="gallery-image secondary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1930_Cropped_1400x.jpg?v=1543545171);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1930_Cropped_1400x.jpg?v=1543545171">
                            </div>
                        </div>
                        <div class="gallery-image secondary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A0941_Cropped_1400x.jpg?v=1543545303);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A0941_Cropped_1400x.jpg?v=1543545303">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="splash-page-section gallery-images-section">
            <div class="section-block background-white">
                <div class="wrapper">
                    <div class="gallery-images large-image-right">
                        <div class="gallery-image primary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1395_Cropped_1400x.jpg?v=1543549130);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1395_Cropped_1400x.jpg?v=1543549130">
                            </div>
                        </div>
                        <div class="gallery-image secondary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1672_Cropped_1400x.jpg?v=1543549295);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A1672_Cropped_1400x.jpg?v=1543549295">
                            </div>
                        </div>
                        <div class="gallery-image secondary">
                            <div class="gallery-image-wrapper" style="background-image:url(//cdn.shopify.com/s/files/1/0558/2845/files/7A1A6924_Cropped_1400x.jpg?v=1543549652);">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/7A1A6924_Cropped_1400x.jpg?v=1543549652">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
<br>


</div>
