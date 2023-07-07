<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DemoController;

// use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AccountpostController;
use App\Http\Controllers\Admin\AdminaccountController;
use App\Http\Controllers\Admin\AdminbusinessController;
use App\Http\Controllers\Admin\AdmincityController;
use App\Http\Controllers\Admin\AdminstateController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PortolioController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\cards\MycardsController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\SubscriptionpackageController;
use App\Http\Controllers\Admin\TemplatemasterController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignStepController;
use App\Http\Controllers\CardServicesController;
use App\Http\Controllers\CategoryInfluencerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\InfluencerPortfolioController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\ServicedetailController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypedetailController;
use App\Http\Controllers\ViewcardController;
use App\Http\Controllers\WritersloganController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomepageController::class, 'privacy'])->name('privacy');
Route::get('/refund', [HomepageController::class, 'refund'])->name('refund');
Route::get('/term', [HomepageController::class, 'term'])->name('term');
// Route::get('home/delete/{id?}',[HomeController::class,'delete'])->name('home.delete');

// New Register as Writer
Route::get('writer-register', [WritersloganController::class, 'RegisterWriter'])->name('writer.register');
Route::post('Writer/Register/store', [WritersloganController::class, 'RegisterWriterstore'])->name('writer.register.store');

// New Register as Writer
Route::get('designer-register', [DesignController::class, 'RegisterDesigner'])->name('designer.register');
Route::post('Designer/Register/store', [DesignController::class, 'RegisterDesignerstore'])->name('designer.register.store');


// New Register as Influencer
Route::get('influencer-register', [InfluencerController::class, 'RegisterInfluencer'])->name('influencer.register');
Route::post('Influencer/Register/store', [InfluencerController::class, 'RegisterInfluencerStore'])->name('influencer.register.store');


// New Register as Brand
Route::get('brand-register', [CampaignController::class, 'RegisterBrand'])->name('brand.register');
Route::post('brand/Register/store', [CampaignController::class, 'RegisterBrandStore'])->name('brand.register.store');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::post('/captcha-validation', [RegisterController::class, 'capthcaFormValidate']);
    Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha']);


    Route::get('dashboard/{id?}', [DemoController::class, 'edit'])->name('demo_edit');
    Route::get('account/setting', [AccountController::class, 'create'])->name('account.account');
    Route::get('feedback/index', [FeedbackController::class, 'index'])->name('feed.index');
    Route::get('inquiry/index', [InquiryController::class, 'index'])->name('inquiry.index');

    // stories
    Route::get('story/index', [StoryController::class, 'index'])->name('story.index');
    Route::get('story/create', [StoryController::class, 'create'])->name('story.create');
    Route::post('story/store', [StoryController::class, 'store'])->name('story.store');
    Route::get('story/edit/{id?}', [StoryController::class, 'edit'])->name('story.edit');
    Route::post('story/update', [StoryController::class, 'update'])->name('story.update');
    Route::get('story/delete/{id?}', [StoryController::class, 'delete'])->name('story.delete');



    // Service Details
    Route::get('serviceDetails/index', [SubscriptionpackageController::class, 'index'])->name('servicedetail.index');
    Route::post('serviceDetails/store', [ServicedetailController::class, 'store'])->name('servicedetail.store');
    Route::get('serviceDetails/edit/{id?}', [ServicedetailController::class, 'edit'])->name('servicedetail.edit');
    Route::post('serviceDetails/update', [ServicedetailController::class, 'update'])->name('servicedetail.update');
    Route::get('serviceDetails/delete/{id?}', [ServicedetailController::class, 'destroy'])->name('servicedetail.delete');



    // Category

    Route::get('admincategory/index', [CategoryController::class, 'index'])->name('admincategory.index');
    Route::get('admincategory/create', [CategoryController::class, 'create'])->name('admincategory.create');
    Route::post('admincategory/store', [CategoryController::class, 'store'])->name('admincategory.store');
    Route::get('admincategory/edit/{id}', [CategoryController::class, 'edit'])->name('admincategory.edit');
    Route::post('admincategory/update', [CategoryController::class, 'update'])->name('admincategory.update');
    Route::get('admincategory/delete/{id?}', [CategoryController::class, 'destroy'])->name('admincategory.delete');

    // account

    Route::get('adminaccount/index', [AdminaccountController::class, 'index'])->name('adminaccount.index');
    Route::get('adminaccount/create', [AdminaccountController::class, 'create'])->name('adminaccount.create');
    Route::post('adminaccount/store', [AdminaccountController::class, 'store'])->name('adminaccount.store');
    Route::get('adminaccount/edit/{id}', [AdminaccountController::class, 'edit'])->name('adminaccount.edit');
    Route::post('adminaccount/update', [AdminaccountController::class, 'update'])->name('adminaccount.update');
    Route::get('adminaccount/delete/{id?}', [AdminaccountController::class, 'destroy'])->name('adminaccount.delete');

    // Business

    Route::get('adminbusiness/index', [AdminbusinessController::class, 'index'])->name('adminbusiness.index');
    Route::get('adminbusiness/create', [AdminbusinessController::class, 'create'])->name('adminbusiness.create');
    Route::post('adminbusiness/store', [AdminbusinessController::class, 'store'])->name('adminbusiness.store');
    Route::get('adminbusiness/edit/{id}', [AdminbusinessController::class, 'edit'])->name('adminbusiness.edit');
    Route::post('adminbusiness/update', [AdminbusinessController::class, 'update'])->name('adminbusiness.update');
    Route::get('adminbusiness/delete/{id?}', [AdminbusinessController::class, 'destroy'])->name('adminbusiness.delete');

    // Business

    Route::get('adminMedia/index', [MediaController::class, 'index'])->name('adminmedia.index');
    Route::get('adminMedia/create', [MediaController::class, 'create'])->name('adminmedia.create');
    Route::post('adminMedia/store', [MediaController::class, 'store'])->name('adminmedia.store');
    Route::get('adminMedia/edit/{id}', [MediaController::class, 'edit'])->name('adminmedia.edit');
    Route::post('adminMedia/update', [MediaController::class, 'update'])->name('adminmedia.update');
    Route::get('adminMedia/delete/{id?}', [MediaController::class, 'destroy'])->name('adminmedia.delete');
    Route::get('adminMedia/downloads', [MediaController::class, 'downloads'])->name('admindownload.index');


    // Account Post

    Route::get('accountpost/index', [AccountpostController::class, 'index'])->name('accountpost.index');
    Route::get('accountpost/create', [AccountpostController::class, 'create'])->name('accountpost.create');
    Route::post('accountpost/store', [AccountpostController::class, 'store'])->name('accountpost.store');
    Route::get('accountpost/edit/{id}', [AccountpostController::class, 'edit'])->name('accountpost.edit');
    Route::get('accountpost/show/{id}', [AccountpostController::class, 'show'])->name('accountpost.show');
    Route::post('accountpost/update', [AccountpostController::class, 'update'])->name('accountpost.update');
    Route::get('accountpost/delete/{id?}', [AccountpostController::class, 'destroy'])->name('accountpost.delete');


    // Template Master

    Route::get('admintemplatemaster/index', [TemplatemasterController::class, 'index'])->name('admintemplatemaster.index');
    Route::get('admintemplatemaster/create', [TemplatemasterController::class, 'create'])->name('admintemplatemaster.create');
    Route::post('admintemplatemaster/store', [TemplatemasterController::class, 'store'])->name('admintemplatemaster.store');
    Route::get('admintemplatemaster/edit/{id}', [TemplatemasterController::class, 'edit'])->name('admintemplatemaster.edit');
    Route::post('admintemplatemaster/update', [TemplatemasterController::class, 'update'])->name('admintemplatemaster.update');
    Route::get('admintemplatemaster/delete/{id?}', [TemplatemasterController::class, 'destroy'])->name('admintemplatemaster.delete');


    // Subscription

    Route::get('adminsubscription/index/{id?}', [SubscriptionController::class, 'index'])->name('adminsubscription.index');
    Route::get('adminsubscription/create', [SubscriptionController::class, 'create'])->name('adminsubscription.create');
    Route::post('adminsubscription/store', [SubscriptionController::class, 'store'])->name('adminsubscription.store');
    Route::get('adminsubscription/edit/{id}', [SubscriptionController::class, 'edit'])->name('adminsubscription.edit');
    Route::post('adminsubscription/update', [SubscriptionController::class, 'update'])->name('adminsubscription.update');
    Route::get('adminsubscription/delete/{id?}', [SubscriptionController::class, 'destroy'])->name('adminsubscription.delete');

    // Subscription Package

    Route::get('adminsubscriptionpackage/index', [SubscriptionpackageController::class, 'index'])->name('adminsubscriptionpackage.index');
    Route::get('adminsubscriptionpackage/create', [SubscriptionpackageController::class, 'create'])->name('adminsubscriptionpackage.create');
    Route::post('adminsubscriptionpackage/store', [SubscriptionpackageController::class, 'store'])->name('adminsubscriptionpackage.store');
    Route::get('adminsubscriptionpackage/edit/{id}', [SubscriptionpackageController::class, 'edit'])->name('adminsubscriptionpackage.edit');
    Route::post('adminsubscriptionpackage/update', [SubscriptionpackageController::class, 'update'])->name('adminsubscriptionpackage.update');
    Route::get('adminsubscriptionpackage/delete/{id?}', [SubscriptionpackageController::class, 'destroy'])->name('adminsubscriptionpackage.delete');

    Route::get('adminsubscriptionpackage/packagedetail/{id?}', [SubscriptionpackageController::class, 'packagedetail'])->name('adminsubscriptionpackage.packagedetail');
    Route::post('adminsubscriptionpackage/packagedetailstore', [SubscriptionpackageController::class, 'packagedetailstore'])->name('adminsubscriptionpackage.packagedetailstore');
    Route::get('adminsubscriptionpackagedetail/delete/{id?}', [SubscriptionpackageController::class, 'detaildelete'])->name('adminsubscriptionpackagedetail.delete');


    // adminstate details
    Route::get('adminstate/index', [AdminstateController::class, 'index'])->name('adminstate.index');
    Route::get('adminstate/create', [AdminstateController::class, 'create'])->name('adminstate.create');
    Route::post('adminstate/store', [AdminstateController::class, 'store'])->name('adminstate.store');
    Route::get('adminstate/edit/{id?}', [AdminstateController::class, 'edit'])->name(('adminstate.edit'));
    Route::post('adminstate/update', [AdminstateController::class, 'update'])->name('adminstate.update');
    Route::get('adminstate/delete/{id?}', [AdminstateController::class, 'delete'])->name('adminstate.delete');


    // admincity details
    Route::get('admincity/index', [AdmincityController::class, 'index'])->name('admincity.index');
    Route::get('admincity/create', [AdmincityController::class, 'create'])->name('admincity.create');
    Route::post('admincity/store', [AdmincityController::class, 'store'])->name('admincity.store');
    Route::get('admincity/edit/{id?}', [AdmincityController::class, 'edit'])->name('admincity.edit');
    Route::post('admincity/update/{id?}', [AdmincityController::class, 'update'])->name('admincity.update');
    Route::get('admincity/delete/{id?}', [AdmincityController::class, 'delete'])->name('admincity.delete');

    // Admin Type
    Route::get('type/index', [TypeController::class, 'index'])->name('type.index');
    Route::get('type/create', [TypeController::class, 'create'])->name('type.create');
    Route::post('type/store', [TypeController::class, 'store'])->name('type.store');
    Route::get('type/edit/{id?}', [TypeController::class, 'edit'])->name('type.edit');
    Route::post('type/update', [TypeController::class, 'update'])->name('type.update');
    Route::get('type/delete/{id?}', [TypeController::class, 'destroy'])->name('type.delete');

    // Admin Coupon
    Route::get('coupon/index', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('coupon/create', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('coupon/store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('coupon/edit/{id?}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('coupon/update', [CouponController::class, 'update'])->name('coupon.update');
    Route::post('coupon/delete', [CouponController::class, 'delete'])->name('coupon.delete');

    // Admin Type detail
    Route::get('typedetail/index', [TypedetailController::class, 'index'])->name('typedetail.index');
    Route::get('typedetail/create', [TypedetailController::class, 'create'])->name('typedetail.create');
    Route::post('typedetail/store', [TypedetailController::class, 'store'])->name('typedetail.store');
    Route::get('typedetail/edit/{id?}', [TypedetailController::class, 'edit'])->name('typedetail.edit');
    Route::post('typedetail/update', [TypedetailController::class, 'update'])->name('typedetail.update');
    Route::get('typedetail/delete/{id?}', [TypedetailController::class, 'destroy'])->name('typedetail.delete');

    // Admin Writer
    Route::get('writer/index/{id?}', [WritersloganController::class, 'index'])->name('writer.index');
    Route::get('writer/create', [WritersloganController::class, 'create'])->name('writer.create');
    Route::post('writer/store', [WritersloganController::class, 'store'])->name('writer.store');
    Route::get('writer/edit/{id?}', [WritersloganController::class, 'edit'])->name('writer.edit');
    Route::post('writer/update', [WritersloganController::class, 'update'])->name('writer.update');
    Route::get('writer/delete/{id?}', [WritersloganController::class, 'destroy'])->name('writer.delete');

    // Admin Designer
    Route::get('design/index', [DesignController::class, 'index'])->name('design.index');
    Route::get('design/show', [DesignController::class, 'show'])->name('design.show');
    Route::get('design/create/{id?}/{category?}', [DesignController::class, 'create'])->name('design.create');
    Route::post('design/store', [DesignController::class, 'store'])->name('design.store');
    Route::get('design/edit/{id?}', [DesignController::class, 'edit'])->name('design.edit');
    Route::post('design/update', [DesignController::class, 'update'])->name('design.update');
    Route::get('design/delete/{id?}', [DesignController::class, 'destroy'])->name('design.delete');

    // admin side slogan and design
    // slogan
    Route::get('adminslogan/adminslogan', [DesignController::class, 'adminslogan'])->name('adminslogan.adminslogan');
    Route::post('adminslogan/approve', [DesignController::class, 'approve'])->name('adminslogan.approve');

    // design
    Route::get('admindesign/admindesign', [DesignController::class, 'admindesign'])->name('admindesign.admindesign');
    Route::get('admindesign/approve/{id?}', [DesignController::class, 'designapprove'])->name('admindesign.approve');
    Route::post('admindesign/designapproveCode', [DesignController::class, 'designapproveCode'])->name('admindesign.designapproveCode');
    Route::post('admindesign/reject', [DesignController::class, 'reject'])->name('admindesign.reject');


    // Influencer
    // influencer category
    Route::get('influencer/category/index', [CategoryInfluencerController::class, 'index'])->name('influencer.index');
    Route::get('influencer/category/create', [CategoryInfluencerController::class, 'create'])->name('influencer.create');
    Route::post('influencer/category/store', [CategoryInfluencerController::class, 'store'])->name('influencer.store');
    Route::get('influencer/category/edit/{id?}', [CategoryInfluencerController::class, 'edit'])->name('influencer.edit');
    Route::post('influencer/category/update', [CategoryInfluencerController::class, 'update'])->name('influencer.update');
    Route::get('influencer/category/delete/{id?}', [CategoryInfluencerController::class, 'destroy'])->name('influencer.delete');

    // influencer profile
    Route::get('influencer/profile', [InfluencerController::class, 'influencerProfile'])->name('influencer.profile');
    Route::get('influencer/edit/{id?}', [InfluencerController::class, 'edit'])->name('influencer.profile.edit');
    Route::post('influencer/update', [InfluencerController::class, 'update'])->name('influencer.profile.update');
    Route::get('influencer/brands', [InfluencerController::class, 'brands'])->name('influencer.brands');
    Route::get('influencer/campaign/{id?}', [InfluencerController::class, 'campaigns'])->name('influencer.campaignView');
    Route::post('influencer/campaignApply', [InfluencerController::class, 'campaignApply'])->name('influencer.campaignApply');
    Route::get('influencer/campaignApplyList', [InfluencerController::class, 'campaignApplyList'])->name('influencer.campaignApplyList');

    // Applies
    Route::get('influencer/campaign/appliersCreate/{campaignId?}/{userId?}', [InfluencerController::class, 'appliersCreate'])->name('brand.campaign.appliersCreate');
    Route::post('influencer/campaign/appliersCreateStore', [InfluencerController::class, 'appliersCreateStore'])->name('brand.campaign.appliersCreateStore');


    // influencer Portfolio
    Route::get('influencer/portfolio', [InfluencerPortfolioController::class, 'index'])->name('influencer.portfolio.index');
    Route::get('influencer/portfolio/create', [InfluencerPortfolioController::class, 'create'])->name('influencer.portfolio.create');
    Route::post('influencer/portfolio/store', [InfluencerPortfolioController::class, 'store'])->name('influencer.portfolio.store');
    Route::get('influencer/portfolio/edit/{id?}', [InfluencerPortfolioController::class, 'edit'])->name('influencer.portfolio.edit');
    Route::post('influencer/portfolio/update', [InfluencerPortfolioController::class, 'update'])->name('influencer.portfolio.update');
    Route::get('influencer/portfolio/delete/{id?}', [InfluencerPortfolioController::class, 'delete'])->name('influencer.portfolio.delete');

    // 

    // Brand
    // campaign
    Route::get('brand/campaign/index', [CampaignController::class, 'index'])->name('brand.campaign.index');
    Route::get('brand/campaign/create', [CampaignController::class, 'create'])->name('brand.campaign.create');
    Route::post('brand/campaign/store', [CampaignController::class, 'store'])->name('brand.campaign.store');
    Route::get('brand/campaign/edit/{id?}', [CampaignController::class, 'edit'])->name('brand.campaign.edit');
    Route::post('brand/campaign/update', [CampaignController::class, 'update'])->name('brand.campaign.update');
    Route::get('brand/campaign/delete/{id?}', [CampaignController::class, 'delete'])->name('brand.campaign.delete');
    Route::get('brand/campaign/appliers', [CampaignController::class, 'appliers'])->name('brand.campaign.appliers');

    // influencer status management
    Route::get('brand/campaign/influencer/approval/{campaignId?}/{userId?}', [CampaignController::class, 'influencerApproval'])->name('brand.campaign.influencerApproval');
    Route::get('brand/campaign/influencer/hold/{campaignId?}/{userId?}', [CampaignController::class, 'influencerOnHold'])->name('brand.campaign.influencerOnHold');
    Route::get('brand/campaign/influencer/reject/{campaignId?}/{userId?}', [CampaignController::class, 'influencerReject'])->name('brand.campaign.influencerReject');
    Route::get('brand/campaign/influencer/detail/{campaignId?}/{userId?}', [CampaignController::class, 'influencerDetail'])->name('brand.campaign.influencerDetail');
    Route::get('brand/campaign/influencer/portfolio/{campaignId?}/{userId?}', [CampaignController::class, 'influencerPortfolio'])->name('brand.campaign.influencerPortfolio');


    // influencer content Management
    Route::get('brand/campaign/influencer/content/approval/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentApproval'])->name('brand.campaign.influencerContentApproval');
    Route::get('brand/campaign/influencer/content/hold/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentOnHold'])->name('brand.campaign.influencerContentOnHold');
    Route::post('brand/campaign/influencer/content/reject/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentReject'])->name('brand.campaign.influencerContentReject');


    // campaign step
    Route::get('brand/campaign/step/index', [CampaignStepController::class, 'index'])->name('brand.campaign.step.index');
    Route::get('brand/campaign/step/create', [CampaignStepController::class, 'create'])->name('brand.campaign.step.create');
    Route::post('brand/campaign/step/store', [CampaignStepController::class, 'store'])->name('brand.campaign.step.store');
    Route::get('brand/campaign/step/edit/{id?}', [CampaignStepController::class, 'edit'])->name('brand.campaign.step.edit');
    Route::post('brand/campaign/step/update', [CampaignStepController::class, 'update'])->name('brand.campaign.step.update');
    Route::get('brand/campaign/step/delete/{id?}', [CampaignStepController::class, 'delete'])->name('brand.campaign.step.delete');
});

Route::get('Admin/layouts/create', [LayoutsController::class, 'create'])->name('admin.layouts.create');

Route::get('notfound', [LayoutsController::class, 'notfound'])->name('notfound');

Route::get('homepage', [HomepageController::class, 'homepage'])->name('wcard.homepage');

// Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/home1', [HomeController::class, 'home1'])->name('layout.home');
Route::get('/home2', [HomeController::class, 'home2'])->name('layout.home1');

Route::get('/cards/create', [MycardsController::class, 'create'])->name('layout.carddetail');

// pricing and Payment
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
Route::get('/payment', [PricingController::class, 'payment'])->name('pricing.payment');
Route::get('/confirmation', [PricingController::class, 'confirmation'])->name('pricing.confirmation');
Route::post('/pricing/payment', [PricingController::class, 'store'])->name('razorpay.payment.store');

// instamoj intigration

Route::get('/paymentSubmit', [PricingController::class, 'paymentSubmit'])->name('pricing.paymentSubmit');
Route::get('/redirect', [PricingController::class, 'redirect'])->name('redirect');


Route::get('/business', [BusinessController::class, 'index'])->name('business.index');
Route::get('/features', [FeaturesController::class, 'index'])->name('features.index');

// Route::get('list', [CardController::class, 'list']);

// Route::post('store-cards', [DetailController::class, 'store'])->name('card.store');

// Route::get('account/card/edit/{id?}',[DetailController::class, 'edit'])->name('details.edit');
// Route::post('account/card/update/{id?}',[DetailController::class, 'update'])->name('account.card.update');


Route::post('link/update', [LinkController::class, 'update'])->name('link.update');
Route::get('detail-delete/{id?}', [LinkController::class, 'delete'])->name('detail.delete');


// demo
// Route::get('demo/{id?}',[DetailController::class, 'demo'])->name('demo');

// Route::get('account/card/services',[ServicesController::class, 'create'])->name('services.create');

Route::get('account/card/portolio', [PortolioController::class, 'create'])->name('portolio.create');



Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.create');
Route::post('category-store', [CategoryController::class, 'store'])->name('category.store');

Route::post('cardcategory-store', [CardServicesController::class, 'storecardservices'])->name('cardcategory.store');
// Route::get('cardcategory-delete/{id?}',[ServicesController::class,'delete'])->name('cardcategory.delete');



/* customer */
// change email

Route::post('change-email', [DemoController::class, 'changeemail'])->name('change.email');
Route::post('change-password', [DemoController::class, 'changepassword'])->name('change.password');

// new route------
Route::get('demo', [DemoController::class, 'index'])->name('demoindex');
Route::post('demo/{id?}', [DemoController::class, 'update'])->name('account.card.update');
Route::post('image-store', [DemoController::class, 'storeimage'])->name('image.store');
Route::get('account/card', [CardController::class, 'index'])->name('account.card');
Route::get('account/card/create', [DemoController::class, 'cardcreate'])->name('details.create');
Route::get('delete/{id?}', [DemoController::class, 'destroy'])->name('link.destroy');
Route::get('cardcategory-delete/{id?}', [DemoController::class, 'servicesdestroy'])->name('cardcategory.delete');
Route::get('photo-delete/{id?}', [DemoController::class, 'photodestroy'])->name('photo.delete');
Route::get('account/card/showcard/{id?}', [DemoController::class, 'view'])->name('account.showcard');
Route::post('store-cards', [DemoController::class, 'store'])->name('card.store');

//business Card
Route::get('mycard/{name?}', [ViewcardController::class, 'index'])->name('account.viewcard');

//whatsapp
Route::post('Whatsapp', [ViewcardController::class, 'whatsapp'])->name('whatsapp');

// slider
Route::post('/sliders', [DemoController::class, 'sliders'])->name('sliders');


// Payments
Route::get('payment/index/{id?}', [PaymentController::class, 'index'])->name('payment.index');
Route::post('payment/update', [PaymentController::class, 'update'])->name('payment.update');

// QR Codes
Route::post('qrcode/store', [QrcodeController::class, 'store'])->name('qrcode.store');
Route::get('qr/delete/{id?}', [QrcodeController::class, 'destroy'])->name('qr.delete');
Route::get('slider/delete/{id?}', [SliderController::class, 'destroy'])->name('slider.delete');

// Feedback Form
Route::post('feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

// Inquiry
Route::post('inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');


//brou
Route::post('brochure/store', [BrochureController::class, 'store'])->name('bro.store');
Route::get('brochure/delete/{id?}', [BrochureController::class, 'destroy'])->name('bro.delete');


// banner
Route::get('banner/index', [BannerController::class, 'index'])->name('banner.index');
Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
Route::get('banner/delete/{id?}', [BannerController::class, 'destory'])->name('banner.delete');

// Product
Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/edit/{id?}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('product/delete/{id?}', [ProductController::class, 'destory'])->name('product.delete');



//  REFER CODE
Route::get('refer/index', [ReferController::class, 'index'])->name('refer.index');


// Offer
Route::controller(OfferController::class)->group(function () {
    Route::get('offer/index', 'index')->name('offer.index');
    Route::get('offer/create', 'create')->name('offer.create');
    Route::post('offer/store', 'store')->name('offer.store');
    Route::get('offer/edit/{id?}', 'edit')->name('offer.edit');
    Route::post('offer/update', 'update')->name('offer.update');
    Route::get('offer/delete/{id?}', 'destroy')->name('offer.delete');
    Route::get('offer/offerdetail/{id?}', 'offerdetail')->name('offer.offerdetail');
    Route::post('offer/offerdetailstore', 'offerdetailstore')->name('offer.offerdetailstore');
    Route::get('offer/offerdetailedit/{id?}', 'offerdetailedit')->name('offer.offerdetailedit');
    Route::post('offer/offerdetailupdate', 'offerdetailupdate')->name('offer.offerdetailupdate');
    Route::get('offer/offerdetaildelete/{id?}', 'offerdetaildelete')->name('offer.offerdetaildelete');
});

// OTP 

Route::controller(OtpController::class)->group(function () {
    Route::get('loginn', 'login')->name('otp.login');
    Route::get('auth/checkotp', 'checkotp')->name('auth.checkotp');
    Route::post('auth/loginotp/{id?}', 'loginotp')->name('auth.loginotp');
    Route::post('otp/generate', 'generate')->name('otp.generate');
});
