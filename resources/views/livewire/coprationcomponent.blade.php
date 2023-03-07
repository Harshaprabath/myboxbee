<link rel="stylesheet" href="{{asset('scss/style.css')}}">
<title>Coparate Gifting</title>
<style>
    .backimage{
        background-size: cover;
        width: 100%;
        height: 100%;

    }
</style>
<section style="width: 100%;height: 900px;">
@if($coparate->isEmpty())
    <div class="backimage" style="background-image: url({{asset('assets/images/side2.webp')}});">
    </div>
    @else
    @foreach($coparate as $c)
    <div class="backimage" style="background-image: url({{asset('upload/frontend')}}/{{$c->image}});">
    </div>
    @endforeach
    @endif
</section>
<div id="shopify-section-page-corporate-concierge" class="shopify-section">
    <div data-section-id="page-corporate-concierge" data-section-type="page">
        <div class="splash-page-section editorial-content-section splash-page-section__lets-get-started">
            <div class="section-block background-white">
                <div class="wrapper">
                    <div class="editorial-form__header">
                        <div class="editorial-form__logo-wrapper">
                            <img class="editorial-form__logo" src="//cdn.shopify.com/s/files/1/0558/2845/files/corporate-logo_1400x.png?v=1611670925" alt="Let's Get Started!">
                        </div>
                        <hr style="margin: 0 50px;height: inherit;border: 1px solid black;">
                        <div class="editorial-form__heading">
                            <h3 class="editorial-form__heading-header">Let's Get Started!</h3>
                            <p class="editorial-form__copy">
                                Hi! We'd love to help with your corporate gifting needs. In order to serve you better, please fill out all the required fields, and someone will be in touch within 48 hours.
                            </p>
                            <div class="editorial-form__request">
                                <span><strong>Have an urgent request?</strong></span> <span class="editorial-form__request-email">Email <a href="mailto:concierge@shopboxfox.com"><strong>concierge@shopBOXFOX.com</strong></a> directly.</span>
                            </div>
                        </div>
                    </div>
                    <div class="editorial-content text-only">
                        <div class="editorial-content-copy">
                            <div class="editorial-form__container">

                                <meta http-equiv="Content-type" content="text/html; charset=UTF-8">


                                <div class="editorial-form">
                                    <form action="/add/query" method="POST" class="ng-pristine ng-valid">
                                    @csrf
                                        <div class="editorial-form__row">
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="first_name">First Name</label><input id="first_name" maxlength="40" name="first_name" size="20" type="text" required=""><br>
                                            </div>
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="last_name">Last Name</label><input id="last_name" maxlength="80" name="last_name" size="20" type="text" required=""><br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__label">
                                            <label for="email">Email</label><input id="email" maxlength="80" name="email" size="20" type="text" required=""><br>
                                        </div>

                                        <div class="editorial-form__row">
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="company">Company</label><input id="company" maxlength="40" name="company" size="20" type="text" required=""><br>
                                            </div>
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000Fmo5q">Box Quantity:</label>
                                                <select required="" name="bquantity">
                                                    <option value="">--None--</option>
                                                    <option value="1-50">1-50</option>
                                                    <option value="50-100">50-100</option>
                                                    <option value="100-200">100-200</option>
                                                    <option value="200-500">200-500</option>
                                                    <option value="500-1000">500-1000</option>
                                                    <option value="1000-5000">1000-5000</option>
                                                    <option value="5000+">5000+</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__row">
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="industry">Industry</label><select id="industry" name="industry" required="">
                                                    <option value=""></option>
                                                    <option value="B2B Tech">B2B Tech</option>
                                                    <option value="Consulting Firms">Consulting Firms</option>
                                                    <option value="Consumer Tech">Consumer Tech</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Entertainment">Entertainment</option>
                                                    <option value="Event Planning">Event Planning</option>
                                                    <option value="Finance / Insurance">Finance / Insurance</option>
                                                    <option value="Food &amp; Bev">Food &amp; Bev</option>
                                                    <option value="Healthcare / Medical">Healthcare / Medical</option>
                                                    <option value="HR / Staffing / Coaching">HR / Staffing / Coaching</option>
                                                    <option value="Law">Law</option>
                                                    <option value="Nonprofit">Nonprofit</option>
                                                    <option value="PR/Marketing/Social">PR/Marketing/Social</option>
                                                    <option value="Real Estate / Coworking">Real Estate / Coworking</option>
                                                    <option value="Retail / Consumer Goods">Retail / Consumer Goods</option>
                                                    <option value="Travel / Hospitality">Travel / Hospitality</option>
                                                    <option value="Utilities / Construction / Freight">Utilities / Construction / Freight</option>
                                                </select><br>
                                            </div>

                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000Fmo65">Use Case:</label><select id="00N4W00000Fmo65" name="usecase" title="Use Case" required="">
                                                    <option value=""></option>
                                                    <option value="Internal Gifting">Internal Gifting</option>
                                                    <option value="External Gifting">External Gifting</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__row">
                                            <div class=" editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000FmoVA">Desired Ship Date:</label><span class="dateInput dateOnlyInput"><input id="00N4W00000FmoVA" name="date" size="12" type="text" required=""></span><br>
                                            </div>
                                            <div class=" editorial-form__label editorial-form__label-col">
                                                <label for="lead_source">Lead Source</label>
                                                <select id="lead_source" name="lead_source" required="">
                                                    <option value="">--None--</option>
                                                    <option value="Article / Press">Article / Press</option>
                                                    <option value="Blog">Blog</option>
                                                    <option value="BOXFOX Homepage">BOXFOX Homepage</option>
                                                    <option value="Concierge - email">Concierge - email</option>
                                                    <option value="Corporate Landing Page">Corporate Landing Page</option>
                                                    <option value="Email Newsletter">Email Newsletter</option>
                                                    <option value="Former Client">Former Client</option>
                                                    <option value="Google Search">Google Search</option>
                                                    <option value="Outbound Inquiry">Outbound Inquiry</option>
                                                    <option value="Referral">Referral</option>
                                                    <option value="Social Media">Social Media</option>
                                                </select>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__row">
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000Fmo6A">Internal Gifting:</label><select id="00N4W00000Fmo6A" name="Igift" title="Internal Gifting" required="">
                                                    <option value=""></option>
                                                    <option value="New Hire / Onboarding">New Hire / Onboarding</option>
                                                    <option value="Milestones">Milestones</option>
                                                    <option value="Sales Club">Sales Club</option>
                                                    <option value="Events">Events</option>
                                                    <option value="Holiday">Holiday</option>
                                                    <option value="Other">Other</option>
                                                </select><br>
                                            </div>
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000Fmo6F">External Gifting:</label><select id="00N4W00000Fmo6F" name="egift" title="External Gifting" required="">
                                                    <option value=""></option>
                                                    <option value="Customer Appreciation / Acquisition / Retention">Customer Appreciation / Acquisition / Retention</option>
                                                    <option value="Prospecting">Prospecting</option>
                                                    <option value="Referral">Referral</option>
                                                    <option value="Closing">Closing</option>
                                                    <option value="VIP">VIP</option>
                                                    <option value="Product Launch / Seeding">Product Launch / Seeding</option>
                                                    <option value="PR / Social / Influencer Mailer">PR / Social / Influencer Mailer</option>
                                                    <option value="Marketing / Advertising">Marketing / Advertising</option>
                                                    <option value="Event Welcome / Thank You">Event Welcome / Thank You</option>
                                                    <option value="Holiday">Holiday</option>
                                                    <option value="Other">Other</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__row">
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000FmoVF">International Shipping?:</label><select id="00N4W00000FmoVF" name="is" title="International Shipping?" required="">
                                                    <option value=""></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select><br>
                                            </div>
                                            <div class="editorial-form__label editorial-form__label-col">
                                                <label for="00N4W00000FmoV0">Have you worked with us before?:</label><select id="00N4W00000FmoV0" name="hyw" title="Have you worked with us before?" required="">
                                                    <option value=""></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="editorial-form__label">
                                            <label for="00N4W00000FmoVK">Tell us a little about the project?:</label><textarea id="00N4W00000FmoVK" name="about" type="text" required="" wrap="soft"></textarea><br>
                                        </div>

                                        <div class="editorial-form__btn-container">
                                            <input class="editorial-form__submit" style="padding: 19px 92px;background-color: black;color:white;margin:10px;" type="submit" name="submit">
                                            <a  style="padding: 16px 78px;border: 1px solid black;margin: 10px;" href="mailto:concierge@shopboxfox.com" class="btn btn-white editorial-form__request-btn">
                                                Request Catalog
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="splash-page-section editorial-content-section splash-page-section__at-your-service">
            <div class="section-block background-black">
                <div class="wrapper">
                    <div class="editorial-content text-only">
                        <div class="editorial-content-copy">
                            <h3>At Your Service</h3>

                            <p style="font-size: 13px;font-weight: 700;line-height: 1.65;">A full-service gifting platform for any type of business. <br>Whether you need enterprise-level efficiency or small business savvy, you can count on a best-in-class gifting experience, at scale.</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- <div class="splash-page-section press-logos-section ">
            <div class="section-block background-white">
                <div class="full-width">

                    <div class="press-logos">
                        <div class="press-logos-container wrapper lg-columns-6 md-columns-3 sm-columns-2">
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/nyt_600x600.png?v=1585066584" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/Google_Logo_600x600.png?v=1585431334" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/facebook_logo_600x600.png?v=1585431389" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/airbnb_600x600.png?v=1585431632" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/Venetian_Logo_8fc8bb18-2ea8-4708-a858-d63d2f7cf4cd_600x600.png?v=1585432201" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/panroda_600x600.png?v=1585432145" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/NIKE_LOGO_8124c2f6-6d27-43b8-944c-744a8c7213a8_600x600.png?v=1585432389" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/INSTACART_600x600.png?v=1585432524" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/HULU_600x600.png?v=1585432586" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/49ers_600x600.png?v=1585432638" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/PINTEREST_copy_600x600.png?v=1585432861" style="height: auto">
                            </div>
                            <div class="logo">
                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/converse_600x600.png?v=1585432903" style="height: auto">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->

        <!-- <div class="splash-page-section client-testimonials-section splash-page-section__what-our-clients-have-to-say">
            <div class="section-block background-white" data-section-id="page-corporate-concierge" data-section-type="client-testimonials">
                <div class="full-width">

                    <div class="client-testimonials" role="toolbar">
                        <h3>What Our Clients Have to Say</h3>
                        <div id="section-page-corporate-concierge" class="client-testimonials-container wrapper lg-columns-3 md-columns-2 sm-columns-1 slick-initialized slick-slider slick-dotted">
                            <div class="previous slick-arrow" style="display: block;"><i class="fas fa-chevron-left"></i></div>

                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 3740px; transform: translate3d(-1496px, 0px, 0px);" role="listbox">
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">The sleek look and feel is very attractive but what really makes BOXFOX standout is the flexibility to customize what we're looking for. Thank you so much for collaborating with us and helping us reach our goals.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-snapchat_600x600.png?v=1586214344" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">We loved how polished, thoughtful, and unique the BOXFOX sets were in comparison to having our premium vendors fulfill gift boxes as such</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-univision_600x600.png?v=1586214353" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">Definitely one of the best "corporate" (for lack of a better term) gifts I have received! So unique and creative and in touch with what people love. Definitely reminds me that BOXFOX curates cooler corporate gifts than most vendors.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-linkedin_600x600.png?v=1586214334" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide" data-slick-index="0" aria-hidden="true" style="width: 374px;" tabindex="-1" role="option" aria-describedby="slick-slide20">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">Definitely one of the best "corporate" (for lack of a better term) gifts I have received! So unique and creative and in touch with what people love. Definitely reminds me that BOXFOX curates cooler corporate gifts than most vendors.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-linkedin_600x600.png?v=1586214334" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 374px;" tabindex="-1" role="option" aria-describedby="slick-slide21">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">The sleek look and feel is very attractive but what really makes BOXFOX standout is the flexibility to customize what we're looking for. Thank you so much for collaborating with us and helping us reach our goals.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-snapchat_600x600.png?v=1586214344" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 374px;" tabindex="-1" role="option" aria-describedby="slick-slide22">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">We loved how polished, thoughtful, and unique the BOXFOX sets were in comparison to having our premium vendors fulfill gift boxes as such</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-univision_600x600.png?v=1586214353" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-current slick-active" data-slick-index="3" aria-hidden="false" style="width: 374px;" tabindex="-1" role="option" aria-describedby="slick-slide23">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">Definitely one of the best "corporate" (for lack of a better term) gifts I have received! So unique and creative and in touch with what people love. Definitely reminds me that BOXFOX curates cooler corporate gifts than most vendors.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-linkedin_600x600.png?v=1586214334" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">Definitely one of the best "corporate" (for lack of a better term) gifts I have received! So unique and creative and in touch with what people love. Definitely reminds me that BOXFOX curates cooler corporate gifts than most vendors.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-linkedin_600x600.png?v=1586214334" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">The sleek look and feel is very attractive but what really makes BOXFOX standout is the flexibility to customize what we're looking for. Thank you so much for collaborating with us and helping us reach our goals.</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-snapchat_600x600.png?v=1586214344" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 374px;" tabindex="-1">
                                        <i class="testimonial-quotes"></i>
                                        <div class="testimonial-content">
                                            <div class="text">We loved how polished, thoughtful, and unique the BOXFOX sets were in comparison to having our premium vendors fulfill gift boxes as such</div>
                                            <div class="logo">
                                                <img src="//cdn.shopify.com/s/files/1/0558/2845/files/logo-univision_600x600.png?v=1586214353" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="next slick-arrow" style="display: block;"><i class="fas fa-chevron-right"></i></div>
                        </div>
                        <ul class="slick-dots" style="display: flex;" role="tablist">
                            <li class="" aria-hidden="true" role="presentation" aria-selected="true" aria-controls="navigation20" id="slick-slide20"><button type="button" data-role="none" role="button" tabindex="0">1</button></li>
                            <li aria-hidden="false" role="presentation" aria-selected="false" aria-controls="navigation21" id="slick-slide21" class="slick-active"><button type="button" data-role="none" role="button" tabindex="0">2</button></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div> -->
        <!-- <div class="splash-page-section media-grid-section " style="padding-bottom: 120px;">
            <div class="section-block">
                <div class="media-grid">
                    <ul class="media-grid__container wrapper">
                        <li class="media-grid__media"><img src="//cdn.shopify.com/s/files/1/0558/2845/files/BF1_1400x.jpg?v=1611655341" alt=""></li>

                        <li class="media-grid__media">
                            <div class="video-wrapper"><iframe src="https://www.youtube.com/embed/57MNvu2nUlk?autoplay=0&amp;rel=0&amp;hd=1&amp;showinfo=0&amp;color=white&amp;controls=0"></iframe></div>
                        </li>

                        <li class="media-grid__media"><img src="//cdn.shopify.com/s/files/1/0558/2845/files/BF2_1400x.png?v=1611655456" alt=""></li>

                        <li class="media-grid__media"><img src="//cdn.shopify.com/s/files/1/0558/2845/files/BF3_1400x.png?v=1611655485" alt=""></li>

                        <li class="media-grid__media"><img src="//cdn.shopify.com/s/files/1/0558/2845/files/BF4_1400x.jpg?v=1611655501" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->
