<style>
    .tree,
    .tree ul {
        margin: 0;
        padding: 0;
        list-style: none
    }

    .tree ul {
        margin-left: 1em;
        position: relative
    }

    .tree ul ul {
        margin-left: .5em
    }

    .tree ul:before {
        content: "";
        display: block;
        width: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        border-left: 1px solid
    }

    .tree li {
        margin: 0;
        padding: 0 1em;
        line-height: 2em;
        color: #fff;
        font-weight: 700;
        position: relative
    }

    .tree ul li:before {
        content: "";
        display: block;
        width: 10px;
        height: 0;
        border-top: 1px solid;
        margin-top: -1px;
        position: absolute;
        top: 1em;
        left: 0
    }

    .tree ul li:last-child:before {
        background: #03ACF0;
        height: auto;
        top: 1em;
        bottom: 0
    }

    .indicator {
        margin-right: 5px;
    }

    .tree li span {
        text-decoration: none;
        color: #fff;
    }

    .tree li button,
    .tree li button:active,
    .tree li button:focus {
        text-decoration: none;
        color: #369;
        border: none;
        background: transparent;
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        outline: 0;
    }
</style>
@role('Admin')
<ul id="tree1">
    <li><span href="#">Admin</span>

        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Content
                <ul>
                    <li><a class="text-white waves-effect" href="{{ route('adminslogan.adminslogan') }}"><span>Slogan</span></a></li>
                    <li><a class="text-white waves-effect" href="{{route('admindesign.admindesign')}}"><span>Design</span></a></li>
                </ul>
            </li>

            <!-- <i class="text-white menu-icon fa fa-calendar"></i> -->
            <li>Category & Media
                <ul>
                    <li><a class="text-white waves-effect" href="{{ route('admincategory.index') }}"><span>Category</span></a></li>
                    <li><a class="text-white waves-effect" href="{{ route('adminmedia.index') }}"><span>Media</span></a></li>
                </ul>
            </li>

            <!-- downloads -->
            <li>
                <!-- <i class="text-white menu-icon fa fa-download"></i> -->
                <a class="text-white waves-effect" href="{{ route('admindownload.index') }}">
                    <span>Downloads</span></a>
            </li>

            <!-- template -->
            <li>
                <!-- <i class="text-white menu-icon fa fa-calendar"></i> -->
                <a class="text-white waves-effect" href="{{ route('admintemplatemaster.index') }}">
                    <span>Template Master</span></a>
            </li>

        </ul>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Master
                <ul>
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
            </li>
        </ul>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Creator
                <ul>
                    <li>
                        <a class="text-white waves-effect" href="{{route('influencer.index')}}"><span>Influencer Category</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="#"><span>Influencer Category</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Extras
                <ul>
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
            </li>
        </ul>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Notification
                <ul>
                    <li><a class="text-white waves-effect" href="{{ route('type.index') }}"><span>Notification type</span></a></li>
                    <li><a class="text-white waves-effect" href="{{ route('typedetail.index') }}"><span>Notification type Detail</span></a></li>
                </ul>
            </li>
        </ul>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
            <li>Settings
                <ul>
                    <li><a class="text-white" href="{{ route('users.index') }}">Manage User</a></li>
                    <li><a class="text-white" href="{{ route('roles.index') }}">Manage Role</a></li>
                    <li><a class="text-white waves-effect" href="{{ route('accountpost.index') }}"><span>Our Users</span></a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>



<ul id="tree2" style="padding-top: 12px;">
    <li><span href="#">Reports</span>
        <ul>
            <!-- <i class="text-white menu-icon bi bi-palette-fill"></i> -->
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
    </li>
</ul>


@endrole

@role('Reseller')
<!-- <span class="text-white" style="padding-left: 100px;">Seller</span> -->

<ul id="tree3" style="padding-top: 12px;">
    <li>
        <!-- <i class="text-white menu-icon fa fa-user"></i> -->
        <a class="text-white waves-effect" href="{{route('reseller.user.index')}}">
            <span>Reseller User</span></a>
    </li>
</ul>

@endrole

@role('Writer')
<!-- <span class="text-white" style="padding-left: 100px;">Writer</span> -->
<ul id="tree4" style="padding-top: 12px;">
    <li>
        <!-- <i class="text-white menu-icon fa fa-quote-left"></i>\ -->
        <a class="text-white waves-effect" href="{{route('writer.index')}}">
            <span>My Slogan</span></a>
    </li>
</ul>
@endrole


@role('Designer')

<!-- <span class="text-white" style="padding-left: 100px;">Designer</span> -->
<ul id="tree5" style="padding-top: 12px;">
    <li>
        <!-- <i class="text-white menu-icon fa fa-quote-right"></i> -->
        <a class="text-white waves-effect" href="{{route('design.index')}}">
            <span>Slogans</span></a>
    </li>
    <li style="padding-top: 12px;">
        <!-- <i class="text-white menu-icon fa fa-paint-brush"></i> -->
        <a class="text-white waves-effect" href="{{route('design.show')}}">
            <span>My Designs</span></a>
    </li>
</ul>

@endrole


<!-- influencer -->

@role('Influencer')
<!-- <span class="text-white" style="padding-left: 100px;">Influencer</span> -->


<ul id="tree6" style="padding-top: 12px;">
    <!-- <li>
        <a class="text-white waves-effect" href="{{route('influencer.profile')}}">
        <i class="text-white menu-icon fa fa-user"></i>
        <span>Profile</span></a>
</li> -->
    <li>
        <a class="text-white waves-effect" href="{{route('influencer.portfolio.index')}}">
            <!-- <i class="text-white menu-icon fa fa-image"></i> -->
            <span>Portfolio</span></a>
    </li>
    <li style="padding-top: 12px;">
        <a class="text-white waves-effect" href="{{route('influencer.brands')}}">
            <!-- <i class="text-white menu-icon fa fa-bullhorn"></i> -->
            <span>Brands</span></a>
    </li>

    <li style="padding-top: 12px;">
        <a class="text-white waves-effect" href="{{route('influencer.campaignApplyList')}}">
            <!-- <i class="text-white menu-icon fa fa-users"></i> -->
            <span>My Applied Campaign</span></a>
    </li>
    <li style="padding-top: 12px;">
        <a class="text-white waves-effect" href="{{route('influencer.campaignApplyList')}}">
            <!-- <i class="text-white menu-icon fa fa-users"></i> -->
            <span>My Applied Campaign</span></a>
    </li>
</ul>


@endrole


@role('Brand')

<!-- <span class="text-white" style="padding-left: 100px;">Brand</span> -->

<ul id="tree7" style="padding-top: 12px;">
    <li>
        <a class="text-white waves-effect" href="{{route('brand.campaign.index')}}">
            <!-- <i class="text-white menu-icon fa fa-user"></i> -->
            <span>Campaign</span></a>
    </li>
    <li style="padding-top: 12px;">
        <a class="text-white waves-effect" href="{{route('brand.campaign.step.index')}}">
            <!-- <i class="text-white menu-icon fa fa-user"></i> -->
            <span>Campaign Step</span></a>
    </li>
    <li style="padding-top: 12px;">
        <a class="text-white waves-effect" href="{{route('brand.campaign.appliers')}}">
            <!-- <i class="text-white menu-icon fa fa-user"></i> -->
            <span>Appliers</span></a>
    </li>
</ul>



@endrole

<!-- business Profile -->
<ul id="tree8" style="padding-top: 12px;">
    <li><span href="#">My Profile</span>
        <ul>
            <li>
                <a class="waves-effect parent-item text-white" href=" {{ route('demo_edit') }}"><span>Profile</span></a>
            </li>
            <li>
                <a class="waves-effect parent-item text-white" href="{{ route('account.account') }}"><span>Account</span></a>
            </li>
            <li>
                <a class="waves-effect parent-item text-white" href="{{ route('feed.index') }}"><span>FeedBack</span></a>
            </li>
            <li>
                <a class="waves-effect parent-item text-white" href="{{ route('inquiry.index') }}"><span>Inquiry</span></a>
            </li>
            <li>
                <a class="waves-effect parent-item text-white" href="{{ route('refer.index') }}"><span>Refer</span></a>
            </li>

            <li>
                <a class="waves-effect parent-item text-white" href="{{route('story.index')}}"><span>My Stories</span></a>
            </li>
        </ul>
    </li>
</ul>



<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $.fn.extend({
        treed: function(o) {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';

            if (typeof o != 'undefined') {
                if (typeof o.openedClass != 'undefined') {
                    openedClass = o.openedClass;
                }
                if (typeof o.closedClass != 'undefined') {
                    closedClass = o.closedClass;
                }
            };

            //initialize each of the top levels
            var tree = $(this);
            tree.addClass("tree");
            tree.find('li').has("ul").each(function() {
                var branch = $(this); //li with children ul
                branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                branch.addClass('branch');
                branch.on('click', function(e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        icon.toggleClass(openedClass + " " + closedClass);
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
            });
            //fire event from the dynamically added icon
            tree.find('.branch .indicator').each(function() {
                $(this).on('click', function() {
                    $(this).closest('li').click();
                });
            });
            //fire event to open branch if the li contains an anchor instead of text
            tree.find('.branch>a').each(function() {
                $(this).on('click', function(e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
            //fire event to open branch if the li contains a button instead of text
            tree.find('.branch>button').each(function() {
                $(this).on('click', function(e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
        }
    });

    //Initialization of treeviews

    $('#tree1').treed();
    $('#tree2').treed();
    $('#tree3').treed();
    $('#tree4').treed();
    $('#tree5').treed();
    $('#tree6').treed();
    $('#tree7').treed();
    $('#tree8').treed();
</script>