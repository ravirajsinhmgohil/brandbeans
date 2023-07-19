<!-- tree view -->
<style>
    /* MENU-LEFT
-------------------------- */
    /* layout */
    #left .ul.nav {
        margin-bottom: 2px;
        font-size: 12px;
        /* to change font-size, please change instead .lbl */
    }

    #left .ul.nav .ul,
    #left .ul.nav .ul li {
        list-style: none !important;
        list-style-type: none !important;
        margin-top: 1px;
        margin-bottom: 1px;
    }

    #left .ul.nav .ul {
        padding-left: 0;
        width: auto;
    }

    #left .ul.nav .ul.children {
        padding-left: 12px;
        width: auto;
    }

    #left .ul.nav .ul.children li {
        margin-left: 0px;
    }

    #left .ul.nav li a:hover {
        text-decoration: none;
    }

    #left .ul.nav li a:hover .lbl {
        color: #fff !important;
    }

    #left .ul.nav li.current>a .lbl {
        background-color: #03ACF0;
        color: #fff !important;
    }

    /* parent item */
    #left .ul.nav li.parent a {
        padding: 0px;
        color: #fff;
    }

    #left .ul.nav>li.parent>a {
        border: solid 1px #fff;
        text-transform: uppercase;
    }

    #left .ul.nav li.parent a:hover {
        background-color: #03ACF0;
        -webkit-box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125);
        -moz-box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.125);
    }

    /* link tag (a)*/
    #left .ul.nav li.parent .ul li a {
        color: #fff;
        border: none;
        display: block;
        padding-left: 5px;
    }

    #left .ul.nav li.parent .ul li a:hover {
        background-color: #03ACF0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }

    /* sign for parent item */
    #left .ul.nav li .sign {
        display: inline-block;
        width: 20px;
        padding: 5px 10px;
        background-color: #03ACF0;
        color: #fff;
    }

    #left .ul.nav li.parent>a>.sign {
        margin-left: 0px;
        background-color: #03ACF0;
    }

    /* label */
    #left .ul.nav li .lbl {
        padding: 5px 12px;
        display: inline-block;
    }

    #left .ul.nav li.current>a>.lbl {
        color: #fff;
    }

    #left .ul.nav li a .lbl {
        font-size: 12px;
    }

    /* THEMATIQUE
------------------------- */
    /* theme 1 */
    #left .ul.nav>li.item-1.parent>a {
        border: solid 1px #03ACF0;
    }

    #left .ul.nav>li.item-1.parent>a>.sign,
    #left .ul.nav>li.item-1 li.parent>a>.sign {
        margin-left: 0px;
        background-color: #03ACF0;
    }

    #left .ul.nav>li.item-1 .lbl {
        color: #fff;
    }

    #left .ul.nav>li.item-1 li.current>a .lbl {
        background-color: #03ACF0;
        color: #fff !important;
    }
</style>


<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div id="left" class="span3">
            <ul id="menu-group-1" class="nav menu ul">
                <li class="item-1 deeper parent active">
                    <a class="" href="#">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-plus fa-lg text-white"></i></span>
                        <span class="lbl">Admin</span>
                    </a>
                    <ul class="children nav-child unstyled small collapse ul" id="sub-item-1">
                        <li class="item-2 deeper parent active">
                            <a class="" href="#">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="sign"><i class="fa fa-plus fa-lg text-white"></i></span>
                                <span class="lbl">Content</span>
                            </a>
                            <ul class="children nav-child unstyled small collapse ul" id="sub-item-2">
                                <li class="item-3 current active">
                                    <a class="" href="#">
                                        <span class="lbl"><a class="text-white waves-effect" href="{{ route('adminslogan.adminslogan') }}"><span>Slogan</span></a></span>
                                    </a>
                                </li>
                                <li class="item-4">
                                    <a class="" href="#">
                                        <span class="lbl"><a class="text-white waves-effect" href="{{route('admindesign.admindesign')}}"><span>Design</span></a></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-5 deeper parent">
                            <a class="" href="#">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-5" class="sign"><i class="fa fa-plus fa-lg text-white"></i></span>
                                <span class="lbl">Menu 2</span>
                            </a>
                            <ul class="children nav-child unstyled small collapse ul" id="sub-item-5">
                                <li class="item-6">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Menu 2.1</span>
                                    </a>
                                </li>
                                <li class="item-7">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Menu 2.2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>





<script>
    ! function($) {

        // Le left-menu sign
        /* for older jquery version
        $('#left ul.nav li.parent > a > span.sign').click(function () {
            $(this).find('i:first').toggleClass("icon-minus");
        }); */

        $(document).on("click", "#left ul.nav li.parent > a > span.sign", function() {
            $(this).find('i:first').toggleClass("icon-minus");
        });

        // Open Le current menu
        $("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("icon-minus");
        $("#left ul.nav li.current").parents('ul.children').addClass("in");

    }(window.jQuery);
</script>


@role('Writer')

<li>
    <a class="text-white waves-effect" href="{{route('writer.index')}}"><i class="text-white menu-icon fa fa-quote-left"></i><span>My Slogan</span></a>
</li>


@endrole
@role('Designer')

<li>
    <a class="text-white waves-effect" href="{{route('design.index')}}"><i class="text-white menu-icon fa fa-quote-right"></i><span>Slogans</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('design.show')}}"><i class="text-white menu-icon fa fa-paint-brush"></i><span>My Designs</span></a>
</li>
@endrole

@role('Influencer')
<li>
    <a class="text-white waves-effect" href="{{route('influencer.profile')}}"><i class="text-white menu-icon fa fa-user"></i><span>Profile</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('influencer.portfolio.index')}}"><i class="text-white menu-icon fa fa-image"></i><span>Portfolio</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('influencer.brands')}}"><i class="text-white menu-icon fa fa-bullhorn"></i><span>Brands</span></a>
</li>

<li>
    <a class="text-white waves-effect" href="{{route('influencer.campaignApplyList')}}"><i class="text-white menu-icon fa fa-users"></i><span>My Applied Campaign</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('influencer.campaignApplyList')}}"><i class="text-white menu-icon fa fa-users"></i><span>My Applied Campaign</span></a>
</li>

@endrole

@role('Brand')
<li>
    <a class="text-white waves-effect" href="{{route('brand.campaign.index')}}"><i class="text-white menu-icon fa fa-user"></i><span>Campaign</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('brand.campaign.step.index')}}"><i class="text-white menu-icon fa fa-user"></i><span>Campaign Step</span></a>
</li>
<li>
    <a class="text-white waves-effect" href="{{route('brand.campaign.appliers')}}"><i class="text-white menu-icon fa fa-user"></i><span>Appliers</span></a>
</li>

@endrole

@role('Reseller')

<li>
    <a class="text-white waves-effect" href="{{route('reseller.user.index')}}"><i class="text-white menu-icon fa fa-user"></i><span>User</span></a>
</li>


@endrole

@role('Admin')

<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon bi bi-palette-fill"></i><span>Content</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <a class="text-white waves-effect" href="{{ route('adminslogan.adminslogan') }}"><span>Slogan</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{route('admindesign.admindesign')}}"><span>Design</span></a>
        </li>

    </ul>
</li>

<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-calendar"></i><span>Category</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <a class="text-white waves-effect" href="{{ route('admincategory.index') }}"><span>Category</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('adminmedia.index') }}"><span>Media</span></a>
        </li>

    </ul>
    <!-- /.sub-menu js__content -->
</li>

<!-- downloads -->
<li>
    <a class="text-white waves-effect" href="{{ route('admindownload.index') }}"><i class="text-white menu-icon fa fa-download"></i><span>Downloads</span></a>
</li>


<!-- template -->
<li>
    <a class="text-white waves-effect" href="{{ route('admintemplatemaster.index') }}"><i class="text-white menu-icon fa fa-calendar"></i><span>Template Master</span></a>
</li>

<!-- master -->

<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-camera"></i><span>Master</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">

        <li>
            <a class="text-white waves-effect" href="{{ route('product.index') }}"><span>Product</span></a>
        </li>

        <li>
            <a class="text-white waves-effect" href="{{ route('adminstate.index') }}"><span>State</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('admincity.index') }}"><span>City</span></a>
        </li>

    </ul>
    <!-- /.sub-menu js__content -->
</li>

<!-- influencer -->
<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon bi bi-palette-fill"></i><span>Creator</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <a class="text-white waves-effect" href="{{route('influencer.index')}}"><span>Influencer Category</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="#"><span>Influencer Category</span></a>
        </li>
    </ul>
</li>

<!-- Extra -->

<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-product-hunt"></i><span>Extras</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <a class="text-white waves-effect" href="{{ route('banner.index') }}"><span>Banner</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('offer.index') }}"><span>Offer</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('coupon.index') }}"><span>Coupon</span></a>
        </li>

    </ul>
    <!-- /.sub-menu js__content -->
</li>


<!-- Notification -->


<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-bell"></i><span>Notification</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li><a class="text-white waves-effect" href="{{ route('type.index') }}"><span>Notification type</span></a></li>
        <li><a class="text-white waves-effect" href="{{ route('typedetail.index') }}"><span>Notification type Detail</span></a></li>
    </ul>
    <!-- /.sub-menu js__content -->
</li>


<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>Settings</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li><a class="text-white" href="{{ route('users.index') }}">Manage User</a></li>
        <li><a class="text-white" href="{{ route('roles.index') }}">Manage Role</a></li>
        <li>
            <a class="text-white waves-effect" href="{{ route('accountpost.index') }}"><span>Our Users</span></a>
        </li>
    </ul>
    <!-- /.sub-menu js__content -->
</li>

<!-- Reports -->
<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>Reports</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <a class="text-white waves-effect" href="{{ route('adminsubscription.index') }}"><span>Subscription</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('adminsubscriptionpackage.index') }}"><span>Subscription Package</span></a>
        </li>
        <li>
            <a class="text-white waves-effect" href="{{ route('accountpost.index') }}"><span>Our Users</span></a>
        </li>
    </ul>
    <!-- /.sub-menu js__content -->
</li>



@endrole


<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>My Profile</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>
            <!-- {{ config('app.username')}} -->
            <a class="waves-effect parent-item text-white" href=" {{ route('demo_edit') }}"><i class="menu-icon fa fa-flag text-white"></i><span>Profile</span></a>
            <!-- /.sub-menu js__content -->
        </li>
        <li>
            <a class="waves-effect parent-item text-white" href="{{ route('account.account') }}"><i class="menu-icon fa fa-adjust text-white"></i><span>Account</span></a>
        </li>
        <li>
            <a class="waves-effect parent-item text-white" href="{{ route('feed.index') }}"><i class="menu-icon fa fa-star text-white"></i><span>FeedBack</span></a>
        </li>
        <li>
            <a class="waves-effect parent-item text-white" href="{{ route('inquiry.index') }}"><i class="menu-icon fa fa-comments text-white"></i><span>Inquiry</span></a>
        </li>
        <!-- <li>
<a class="waves-effect parent-item text-white" href="{{ route('pricing.index') }}"><i class="menu-icon fa fa-money text-white"></i><span>Pricing</span></a>
</li> -->
        <li>
            <a class="waves-effect parent-item text-white" href="{{ route('refer.index') }}"><i class="menu-icon fa fa-user-plus text-white"></i><span>Refer</span></a>
        </li>

        <li>
            <a class="waves-effect parent-item text-white" href="{{route('story.index')}}"><i class="menu-icon bi bi-hourglass-split text-white"></i><span>My Stories</span></a>
        </li>

    </ul>
    <!-- /.sub-menu js__content -->
</li>