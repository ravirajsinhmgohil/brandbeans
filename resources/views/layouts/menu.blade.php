@role('Admin')
    <li class="{{ Route::is('home') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('home') }}"><i class="text-white menu-icon fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>
    <li>
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-paint-brush"></i><span>Content</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content ">
            <li>
                <a class="text-white waves-effect" href="{{ route('admincategory.index') }}"><span>Category</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{ route('adminmedia.index') }}"><span>Media</span></a>
            </li>
            <!-- downloads -->
            <li>
                <a class="text-white waves-effect" href="{{ route('admindownload.index') }}"><span>Downloads</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{ route('adminslogan.adminslogan') }}"><span>Slogan</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{ route('admindesign.admindesign') }}"><span>Design</span></a>
            </li>


        </ul>
    </li>



    <!-- master -->

    <li>
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-camera"></i><span>Master</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content ">
            <!-- template -->
            <li>
                <a class="text-white waves-effect" href="{{ route('admintemplatemaster.index') }}"><span>Template Master</span></a>
            </li>
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
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-paint-brush"></i><span>Creator</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content ">
            <li>
                <a class="text-white waves-effect" href="{{ route('influencer.index') }}"><span>Influencer Category</span></a>
            </li>
            {{-- <li>
                <a class="text-white waves-effect" href="#"><span>Influencer Category</span></a>
            </li> --}}
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
        </ul>
        <!-- /.sub-menu js__content -->
    </li>

    <!-- Reports -->
    <li class="{{ Route::is('adminsubscription.index') ? 'active' : '' }} {{ Route::is('adminsubscriptionpackage.index') ? 'active' : '' }}">
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>Reports</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content " style="{{ Route::is('adminsubscription.index') ? 'display:block' : 'none' }} ">
            <li>
                <a class="text-white waves-effect" href="{{ route('adminsubscription.index') }}"><span>Our Users</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{ route('adminsubscriptionpackage.index') }}"><span>Subscription Package</span></a>
            </li>
            <li>
                {{-- <a class="text-white waves-effect" href="{{ route('accountpost.index') }}"><span>Our Users</span></a> --}}
            </li>
        </ul>
        <!-- /.sub-menu js__content -->
    </li>

    <li class="{{ Route::is('reseller.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('reseller.index') }}"><i class="text-white menu-icon fa fa-user"></i><span>Reseller</span></a>
    </li>
@endrole

@role('Writer')
    <li class="{{ Route::is('writer.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('writer.index') }}"><i class="text-white menu-icon fa fa-quote-left"></i><span>My Slogan</span></a>
    </li>
@endrole
@role('Designer')
    <li class="{{ Route::is('design.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('design.index') }}"><i class="text-white menu-icon fa fa-quote-right"></i><span>Slogans</span></a>
    </li>
    <li class="{{ Route::is('design.show') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('design.show') }}"><i class="text-white menu-icon fa fa-paint-brush"></i><span>My Designs</span></a>
    </li>
@endrole

@role('Influencer')
    <li class="{{ Route::is('influencer.portfolio.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('influencer.portfolio.index') }}"><i class="text-white menu-icon fa fa-image"></i><span>Portfolio</span></a>
    </li>
    <li class="{{ Route::is('influencer.brands') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('influencer.brands') }}"><i class="text-white menu-icon fa fa-bullhorn"></i><span>Brands</span></a>
    </li>

    <li class="{{ Route::is('influencer.campaignApplyList') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('influencer.campaignApplyList') }}"><i class="text-white menu-icon fa fa-users"></i><span>My Applied Campaign</span></a>
    </li>
@endrole

@role('Brand')
    <li class="{{ Route::is('brand.campaign.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('brand.campaign.index') }}"><i class="text-white menu-icon fa fa-user"></i><span>Campaign</span></a>
    </li>
    <li class="{{ Route::is('brand.campaign.step.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('brand.campaign.step.index') }}"><i class="text-white menu-icon fa fa-user"></i><span>Campaign Step</span></a>
    </li>
    <li class="{{ Route::is('brand.campaign.appliers') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('brand.campaign.appliers') }}"><i class="text-white menu-icon fa fa-user"></i><span>Appliers</span></a>
    </li>
@endrole

@role('Reseller')
    <li class="{{ Route::is('reseller.user.index') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('reseller.user.index') }}"><i class="text-white menu-icon fa fa-user"></i><span>Reseller User</span></a>
    </li>
    <li class="{{ Route::is('reseller.passbook') ? 'active' : '' }}">
        <a class="text-white waves-effect" href="{{ route('reseller.passbook') }}"><i class="text-white menu-icon fa fa-user"></i><span>Passbook</span></a>
    </li>
@endrole



<li>
    <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>My Profile</span><span class="menu-arrow fa fa-angle-down"></span></a>
    <ul class="sub-menu js__content ">
        <li>

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
            <a class="waves-effect parent-item text-white" href="{{ route('story.index') }}"><i class="menu-icon bi bi-hourglass-split text-white"></i><span>My Stories</span></a>
        </li>

    </ul>
    <!-- /.sub-menu js__content -->
</li>
