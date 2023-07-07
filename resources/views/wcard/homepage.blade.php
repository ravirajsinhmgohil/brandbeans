@extends('layout.app')
<link href="{{ asset('asset/css/homepage.css') }}" rel="stylesheet">

@section('content')
    <div class="container-fluid">
        {{-- section1 --}}
        <div class="row" style="background-color: #8B5CF6">
            <div class="col-md-6 col-sm-6">
                <div class="section1">
                    <h2>Create Your</h2>
                    <h1>Digital Business Card</h1>
                    <p class="peregraf">A better way to present yourself
                        &<br> get more business connects.</p>
                    <div class="col mt-5">
                        <a href="http://127.0.0.1:8000/pricing"><button class="btn btn1 btn-warning fw-bold"
                                type="submit">Create
                                Now &nbsp;<i class="bi bi-chevron-right"></i></button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6  text-center">
                <img class="img-fluid homeimage" src="{{ asset('asset/img/img4.jpg') }}">
            </div>
        </div>
        {{-- section1 end --}}

        {{-- section2 --}}
        <div class="container pt-5 pb-5">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="col text-center">
                        <p style="font-size: 60px;  font-weight: bold;">Showcase Your</p>
                        <p style="font-size: 25px; color: #EC48B3">Social Links</p>
                    </div><br>
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/img/img2.jpg') }}" alt="Los Angeles" class="d-block"
                            style="width:100%; height: 50%;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/img/img5.jpg') }}" alt="Chicago" class="d-block"
                            style="width:100%; height: 50%;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/img/img7.jpg') }}" alt="New York" class="d-block"
                            style="width:100%; height: 50%;">
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            <div class="col pt-4 mt-5 text-center">
                <a href="http://127.0.0.1:8000/pricing"><button class="btn btn1 btn-warning mainbtn" type="submit">Showcase
                        Yourself &nbsp;<i class="bi bi-chevron-right"></i></button></a>
            </div>
        </div>
        {{-- section2 end --}}

        {{-- section3 --}}
        <div class="row mt-5 pt-5 mb-5" style="background-color: #F9FAFB">
            <div class="container">
                <div class="text-center">
                    <h1 class="fw-bold">What is digital business card?</h1>
                    <p class="mt-4 text-xl text-gray-500">In the modern world of business, marketers are inventing
                        new ways to engage the target audience.<br> One of the cost-effective ways to draw clients’
                        attention is
                        to
                        hand out digital business cards.</p>
                </div>
                <div class="row" style="padding-left: 10%">
                    <div class="col-md-6 col-sm-6">
                        <h1 class="pt-5">How wCard Works?</h1>
                        <p class="text-xl text-gray-500">wCard pages are fully customizable, and
                            can
                            be share with
                            anyone without any app.</p>
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col-1">
                                    <i class="bi bi-person-plus work"></i>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="col-10">
                                    <h5>Create</h5>
                                    <p class="text-lg text-gray-500">It is as simple as creating an email account just fill
                                        up a
                                        form and your digital identity
                                        will unfold right in front of your eyes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col-1">
                                    <i class="bi bi-pencil work"></i>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="col-10">
                                    <h5>Update</h5>
                                    <p class="text-lg text-gray-500">Keep your business details on your digital card up to
                                        date.
                                        Example: Social Links, Contact details, About, portfolio, videos, etc</p>
                                </div>
                            </div>
                        </div>
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col-1">
                                    <i class="bi bi-share work"></i>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="col-10">
                                    <h5>Share</h5>
                                    <p class="text-lg text-gray-500">As soon as its done, you can start sharing it with the
                                        world
                                        using a QR code or send link on WhatsApp, email, text, social media and more. Anyone
                                        can
                                        open your card and see your details without any app.</p>
                                </div>
                            </div>
                        </div>
                        <a href="/pricing" class="text-pink-500 font-semibold text-lg flex items-center fw-bold"
                            style="color: #EC48B3">
                            Create Your Free Card<i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6 text-center">
                        <img class="img-fluid homeimage" src="{{ asset('asset/img/img4.jpg') }}">
                    </div>
                    <div class="col-md-6 col-sm-6 text-center">
                        <img class="img-fluid homeimage" src="{{ asset('asset/img/img4.jpg') }}">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h1 class="pt-5">Design, edit, and publish easily.​​​</h1>
                        <p class="text-xl text-gray-500">wCard's easy, mobile-first builder enables you to create your
                            digital business card page without code. Choose from pre-designed elements with already
                            optimised layouts allowing you just focus on what matters most - adding your content.
                        </p>
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Action Button</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">WhatsApp Button</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Custom Color</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Social Links</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Payments Links</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Address & Google Map</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">PDF Attachments</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Youtube</p>
                                </div>
                                <div class="col-1">
                                    <i class="bi bi-check2 text-gray-500" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11">
                                    <p class="text-gray-500">Education & Work Exeperience</p>
                                </div>
                                <p class="text-gray-500 fw-bold">...and more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- section3 end --}}

        {{-- section4 --}}
        <div class="row mt-5 pt-5 mb-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fw-bold">More Amazing Features</h1>
                    <p class="mt-4 text-xl text-gray-500">wCard is built by designers, engineers and strategists for
                        other
                        creators. We<br> understand what you need to grow your business and have delivered these set
                        of<br>
                        amazing
                        features.</p>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-3 pt-3">
                            <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-palette2 work1"></i>
                                    <h5 class="card-title pt-4">Theme Colors</h5>
                                    <p class="card-text pt-3 text-gray-500 text-lg">Choose color that suits your
                                        brand.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pt-3">
                            <div class="card" style="background-color: #F3F4F6; border-radius: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-moon work1"></i>
                                    <h5 class="card-title pt-4">Dark / Light Mode</h5>
                                    <p class="card-text pt-3 text-gray-500 text-lg">Your page visitors can switch
                                        between
                                        light and dark mode.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pt-3">
                            <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-code-slash work1"></i>
                                    <h5 class="card-title pt-4">SEO Friendly</h5>
                                    <p class="card-text pt-3 text-gray-500 text-lg">Our pages are optimized for search
                                        results using page titles, description & images.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pt-3">
                            <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-slack work1"></i>
                                    <h5 class="card-title pt-4">Social & Payment Links</h5>
                                    <p class="card-text pt-3 text-gray-500 text-lg">Add more than 50 links on your page
                                        to
                                        share your social profiles and collect payments.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-3 pt-3">
                    <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                        <div class="card-body text-center">
                            <i class="bi bi-globe work1"></i>
                            <h5 class="card-title pt-4">Custom Domain</h5>
                            <p class="card-text pt-3 text-gray-500 text-lg">Feel free to use the default wCard
                                subdomain and your own custom domain.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pt-3">
                    <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                        <div class="card-body text-center">
                            <i class="bi bi-bag-check work1"></i>
                            <h5 class="card-title pt-4">HTTPS Included</h5>
                            <p class="card-text pt-3 text-gray-500 text-lg">Modern websites need HTTPS. We
                                include
                                it for free for all sites via Let's Encrypt.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pt-3">
                    <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                        <div class="card-body text-center">
                            <i class="bi bi-arrow-repeat work1"></i>
                            <h5 class="card-title pt-4">Automatic Updates</h5>
                            <p class="card-text pt-3 text-gray-500 text-lg">We constantly add new features to
                                wCard
                                and deliver these automatically
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pt-3">
                    <div class="card" style="background-color: #F3F4F6;  border-radius: 10px;">
                        <div class="card-body  text-center">
                            <i class="bi bi-chat-dots work1"></i>
                            <h5 class="card-title pt-4">Get Support</h5>
                            <p class="card-text pt-3 text-gray-500 text-lg">Get fast, professional support
                                through
                                our online community of creators.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col pt-4 mt-5 text-center">
            <a href="http://127.0.0.1:8000/features"><button class="btn btn1 btn-warning mainbtn" type="submit">View
                    All Features &nbsp;<i class="bi bi-chevron-right"></i></button></a>
        </div>
        {{-- section4 end --}}

        {{-- section5 --}}
        <div class="mt-5 mb-5" style="background-color:#F3F4F6;">
            <div class="container pt-5">
                <div class="text-center">
                    <h2 class="fw-bold"><span style="color: #EC48B3">wCard.io</span> is used by people
                        across top companies</h2>
                </div>
                <div class="container pt-5 pb-5">
                    <div class="row">
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/google.png') }}" />
                        </div>
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/a1.png') }}" />
                        </div>
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/att.png') }}" />
                        </div>
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/t1.png') }}" />
                        </div>
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/uber.png') }}" />
                        </div>
                        <div class="col">
                            <img class="images1" src="{{ asset('asset/img/Target.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- section5 end --}}

        {{-- section6 --}}
        <div class="row mt-5 pt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fw-bold">Update Anything Anytime</h1>
                    <p class="mt-4 text-xl text-gray-500">Your Digital Business Card is fully dynamic as you. Add/Edit
                        content
                        as<br> many times as you want. Keep adding clients and companies you work with, as your
                        experience<br>
                        keeps
                        growing.</p>
                    <img class="images3 pt-3" src="{{ asset('asset/img/i3.png') }}" />
                </div>
            </div>
        </div>
        {{-- section6 end --}}

        {{-- section7 --}}
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="container mb-5 mt-5" style="width: 60%; font-size: 18px;">
                <h1 class="fw-bold text-center pb-5">Frequently asked questions</h1>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            <h5 class="fw-bold" style="color: black; "> What is a Digital Business Card?</h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <p>A digital business card (also known as virtual business cards, electronic business cards,
                                smart
                                business cards, and digital visiting cards) is an online means of sharing contact
                                information.</p>
                            <p>You can create a digital business card on an iPhone, iPad, Android, or computer, and
                                they’re
                                often more affordable than their paper counterparts. Like typical business cards,
                                electronic
                                business cards can be customized, designed, and shared with anyone.</p>
                            <p>There are no space constraints with digital cards—you can add as much or as little
                                information to your card as you’d like. In addition to your standard contact information
                                (like your name, company, email, and phone number), you can enrich your card with a
                                photo or
                                video, a logo, social media profiles, badges, PDFs, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            <h5 class="fw-bold" style="color: black; "> Do I need any coding knowledge to create my card?
                            </h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <p>No. There is absolutely no need to put yourself through programming courses to use wCard. And
                                you certainly won’t need to hire a web developer either.
                            </p>
                            <p>wCard uses a drag-and-drop editor and requires no prior skills or knowledge to use. We’ve
                                made sure that even a complete beginner will be comfortable using all of wCard's features.
                            </p>
                            <p>All of the extensions and tools that are offered on our business card-building platform are
                                designed to be as simple and quick to use as possible.
                            </p>
                            <p>Unlike other card builders, you won’t need any technical knowledge or technical skills to
                                create a new card with wCard. In fact, you can get online with just a few clicks.
                            </p>
                            <p>Our drag and drop interface has all the features you need as a small business owner or
                                professional to get yourself online.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            <h5 class="fw-bold" style="color: black; "> Can I use custom domain?
                            </h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <p>Yes, we encourage you to do so. Although you can publish your business card under a subdomain
                                that we will provide each card for free, having a website with a bespoke domain adds layers
                                of trust and identity to your brand.
                            </p>
                            <p>You can connect your own unique domain with wCard.
                            </p>
                            <p>Connecting a domain to your business card is easy. Follow the on-screen instructions on
                                wCard’s dashboard and visitors will be able to access your site via your domain in just a
                                few hours.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFor" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFor">
                            <h5 class="fw-bold" style="color: black; "> Is my digital business card SEO friendly?
                            </h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingFor">
                        <div class="accordion-body">
                            <p>You might have heard that SEO is extremely important when it comes to ranking your website
                                high up on search engine results. And it’s true.
                            </p>
                            <p>Every card created with wCard will be search engine optimized (SEO) by default. Yet, if you
                                want more control over your card, e.g. changing meta titles and descriptions we allows you
                                to do that too.
                            </p>
                            <p>Plus, our page speeds are lightning-fast, ensuring that your website or store always reaches
                                peak performance and doesn’t scare away potential clients.
                            </p>
                            <p>wCard is designed to increase your online presence on search engines with a combination of
                                SEO tools and templates designed for search engine optimization right out of the box.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-Five">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFive">
                            <h5 class="fw-bold" style="color: black; "> Will my digital business card be mobile friendly?
                            </h5>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-Five">
                        <div class="accordion-body">
                            <p>Each and every card that you create using the wCard will be mobile responsive by default, but
                                more than that, it will function on any device, not just on a mobile device.
                            </p>
                            <p>We know it’s essential to all small business owners to be where their visitors are – and
                                they’re increasingly on mobile devices – so we’ve focused on making sure our digital cards
                                are mobile optimized to give the best experience to your card visitors.
                            </p>
                            <p>Although most of the mobile responsiveness will be taken care of by our platform
                                automatically, you can also see the preview of your card on mobile screen while editing to
                                make sure that your card looks the way you want it to.
                            </p>
                            <p>It’s one of the design features that will help you build a beautiful card, generate leads,
                                and drive traffic.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- section7 end --}}

        {{-- section8 --}}
        <div class="row home-banner3 pt-5 pb-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="fw-bold text-center"><span style="color: #F24D79"> wCard.io </span></h2>
                        <div class=" text-center">
                            <h1 class="fw-bold">One page to share everything.</h1>
                            <p class="mt-4 text-mx-start fs-4">From contact to social links, videos to websites, wCard
                                Pages lets you share all <br>your content in a beautiful one-page website.
                            </p>
                        </div>
                        <div class="col mt-4 text-center">
                            <a href="{{ route('pricing.index') }}"><button class="btn btn1 btn-warning mainbtn"
                                    type="submit">Start For Free &nbsp;<i class="bi bi-chevron-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- section8  end --}}



    </div>
@endsection
