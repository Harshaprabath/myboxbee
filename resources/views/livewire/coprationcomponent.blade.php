<title>Coparate Gifting</title>

<section data-aos="fade-up">
    @if($coparate->isEmpty())
    <div class="ab-image-custom" style="background-image: url({{asset('assets/images/side2.webp')}});">
    </div>
    @else
    @foreach($coparate as $c)
    <div class="ab-image-custom" style="background-image: url({{asset('upload/frontend')}}/{{$c->image}});">
    </div>
    @endforeach
    @endif
</section>


<div class="d-flex justify-content-center align-items-center ab-title-custoom-padding" data-aos="fade-up">
    <div class="text-center">
        <h3>Let's Get Started!</h3>
        <p>
            Hi! We'd love to help with your corporate gifting needs. In order to serve you better,
            please fill out all the required fields, and someone will be in touch within 48 hours.
        </p>
        <div>
            <span><strong>Have an urgent request?</strong></span> <br><span>Email <a
                    href="mailto:concierge@shopboxfox.com"
                    class="btn-outline-danger"><strong>concierge@shopBOXFOX.com</strong></a>
                directly.</span>
        </div>
    </div>
</div>

<form class="ab-body-custoom-padding" data-aos="fade-down">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputfirstname">First name</label>
            <input type="text" class="form-control" placeholder="First name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputfirstname">Last name</label>
            <input type="text" class="form-control" placeholder="Last name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCompany">Company</label>
            <input type="text" class="form-control" placeholder="Company">
        </div>
        <div class="form-group col-md-6">
            <label for="inputBoxQuantity">Box Quantity</label>
            <select id="inputBoxQuantity" class="form-control">
                <option selected>Choose...</option>
                <option>1-50</option>
                <option>50-100</option>
                <option>100-200</option>
                <option>200-500</option>
                <option>500-1000</option>
                <option>1000-5000</option>
                <option>5000+</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputIndustry">Industry</label>
            <select id="inputIndustry" class="form-control">
                <option selected>Choose...</option>
                <option>B2B Tech</option>
                <option>Consulting Firms</option>
                <option>Consumer Tech</option>
                <option>Education</option>
                <option>Entertainment</option>
                <option>Event Planning</option>
                <option>Finance / Insurance</option>
                <option>Food &amp; Bev</option>
                <option>Healthcare / Medical</option>
                <option>HR / Staffing / Coaching</option>
                <option>Law</option>
                <option>Nonprofit</option>
                <option>PR/Marketing/Social</option>
                <option>Real Estate / Coworking </option>
                <option>Retail / Consumer Goods</option>
                <option>Travel / Hospitality</option>
                <option>Utilities /Construction / Freight</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputUseCase">Use Case</label>
            <select id="inputUseCase" class="form-control">
                <option selected>Choose...</option>
                <option>Internal Gifting</option>
                <option>External Gifting</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputDesiredShipDate">Desired Ship Date</label>
            <input type="text" class="form-control" placeholder="Desired Ship Date">
        </div>
        <div class="form-group col-md-6">
            <label for="inputLeadSource">Lead Source</label>
            <select id="inputLeadSource" class="form-control">
                <option selected>Choose...</option>
                <option>Article / Press</option>
                <option>Blog</option>
                <option>BOXFOX Homepage</option>
                <option>Concierge - email</option>
                <option>Corporate Landing Page</option>
                <option>Email Newsletter</option>
                <option>Former Client</option>
                <option>Google Search</option>
                <option>Outbound Inquiry</option>
                <option>Referral</option>
                <option>Social Media</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputInternalGifting">Internal Gifting</label>
            <select id="inputInternalGifting" class="form-control">
                <option selected>Choose...</option>
                <option>New Hire / Onboarding</option>
                <option>Milestones</option>
                <option>Sales Club</option>
                <option>Events</option>
                <option>Holiday</option>
                <option>Other</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputExternalGifting">External Gifting</label>
            <select id="inputExternalGifting" class="form-control">
                <option selected>Choose...</option>
                <option>Customer Appreciation / Acquisition / Retention</option>
                <option>Prospecting</option>
                <option>Referral</option>
                <option>Closing</option>
                <option>VIP</option>
                <option>Product Launch / Seeding</option>
                <option>PR / Social /Influencer Mailer</option>
                <option>Marketing / Advertising </option>
                <option>Event Welcome / Thank You </option>
                <option>Holiday</option>
                <option>Other</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputInternationalShipping?">International Shipping?</label>
            <select id="inputInternationalShipping?g" class="form-control">
                <option selected>Choose...</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputWorkebefoer">Have you worked with us before?</label>
            <select id="inputWorkebefoer" class="form-control">
                <option selected>Choose...</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAbout">Tell us a little about the project?</label>
       <textarea id="inputAbout" class="form-control"  placeholder="Tell us a little about the project?" type="text"></textarea>
         </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
    <a class="btn btn-primary" href="mailto:concierge@shopboxfox.com">Request Catalog</a>
</form>


