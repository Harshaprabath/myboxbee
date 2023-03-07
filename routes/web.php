<?php

use App\Models\card;
use App\Models\User;
use App\Models\order;
use App\Models\slider;
use App\Models\fetuers;
use App\Models\sticker;
use App\Models\allorder;
use App\Models\cardcategory;
use App\Http\Controllers\Email;
use App\Http\Livewire\Readytoship;
use App\Http\Controllers\Controller;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Aboutcomponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Searchcomponent;
use App\Http\Controllers\boxcontroller;
use App\Http\Controllers\carcontroller;
use App\Http\Livewire\DetailsComponent;
// use App\Http\Livewire\GiftboxComponent;
use App\Http\Controllers\ordercontrolle;
use App\Http\Controllers\usercontroller;
use App\Http\Livewire\Wishlistcomponent;
use Illuminate\Support\Facades\Redirect;
use App\Http\Livewire\Coprationcomponent;
use App\Http\Controllers\Genaralcontrolle;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\stickercontroller;
use App\Http\Livewire\Useraccountcomponent;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontendcontroller;
use App\Http\Controllers\GiftvoucherController;
use App\Http\Controllers\ReadytoshipController;
use App\Models\readytoship as ModelsReadytoship;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Livewire\Readytoshipdetailscomponent;
use App\Http\Livewire\Shop\CollectionallComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Collection\Cosmeticcomponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Collection\NewArriavalcomponent;
use App\Http\Livewire\GiftBoxComponent;

// use App\Http\Livewire\GiftCardBuilder;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/checkout/email', [Email::class, 'get']);
Route::get('/', HomeComponent::class);
Route::post('/search', Searchcomponent::class);
Route::get('/shop/{url}', ShopComponent::class)->name('shop');


Route::get('/about', Aboutcomponent::class);
Route::get('/cart/model', [CartController::class, 'model']);
Route::get('/cart', CartComponent::class);
Route::get('/apps/iwish', Wishlistcomponent::class);
Route::get('/collection/ready-to-ship', Readytoship::class);
Route::get('/collection/coperate', Coprationcomponent::class);

Route::post('/add-to-cart/box', [CartController::class, 'box']);
Route::post('/add-to-cart', [CartController::class, 'addtocart']);
Route::post('/add-to-cart/card/screenshort', [CartController::class, 'addscreenshort']);
Route::post('/add-to-cart/gift', [CartController::class, 'gift']);
Route::post('/add-to-cart/card', [CartController::class, 'card']);
Route::post('/add-to-cart/voucher', [CartController::class, 'voucher']);
Route::post('/add-to-cart/sticker', [CartController::class, 'sticker']);

Route::get('/product/readytoship/{id}', Readytoshipdetailscomponent::class)->name('product.readytoship');
Route::get('/collections/gift-box-builder-gifts', GiftBoxComponent::class)->name('gift-box-build');
Route::post('/add-to-cart/radyoship', [CartController::class, 'redytoship']);

// test route
// Route::get('gift-box-test', GiftCardBuilder::class);

Route::group(['middleware' => ['auth', 'isuser']], function () {
    Route::get('/product/{id}', DetailsComponent::class)->name('product.details');
    Route::get('/home', HomeComponent::class);
    Route::post('/add/query', [CartController::class, 'query']);
    Route::post('/update-to-cart', [CartController::class, 'updatetocart']);
    Route::post('/remove-to-cart', [CartController::class, 'remove']);
    Route::post('/add-to-wishlist', [CartController::class, 'addwishlist']);
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    // Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');
    Route::get('/collection/all', CollectionallComponent::class);
    Route::get('/collection/new-arrival', NewArriavalcomponent::class);
    Route::get('/collection/cosmetic/{url}', Cosmeticcomponent::class)->name('collection.cosmetic');
    Route::get('/myaccount', Useraccountcomponent::class);
    Route::post('/admin/add-checkout', [Controller::class, 'order']);
    Route::get('/userupdate', function () {
        $user = User::find(Auth::id());
        return view('updateuser', ['user' => $user]);
    });
    Route::get('/myorder', function () {
        $order = allorder::where('user_id', '=', Auth::id())->get();
        return view('myorder', ['order' => $order]);
    });
    Route::get('/cancelorder', function () {
        $order = allorder::where('user_id', '=', Auth::id())->where('action', '=', '0')->get();
        return view('cancelorder', ['order' => $order]);
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});


Route::group(['middleware' => ['auth', 'authadmin']], function () {
    Route::get('/admin', function () {
        if (auth()->user()->utype == 'ADM') {
            $pending = allorder::where('action', '=', '1')->count();
            $complete = allorder::where('action', '=', '3')->count();
            $cancel = allorder::where('action', '=', '0')->count();
            $process = allorder::where('action', '=', '2')->count();
            $today = date('Y-m-d');
            $order = order::whereYear('orders.created_at', '=', date('Y'))
                ->whereMonth('orders.created_at', '=', date('m'))
                ->whereDay('orders.created_at', '=', date('d'))
                ->join('users', 'orders.user_id', '=', 'users.id')->get(['orders.*', 'users.name']);
            return view('admin.dashboard', ['pending' => $pending, 'compete' => $complete, 'cancel' => $cancel, 'process' => $process, 'order' => $order, 'today' => $today]);
        } else {
            return redirect('/');
        }
    });

    Route::get('/admin/category-add', [CategoryController::class, 'index']);
    Route::post('/admin/add-to-color', [CategoryController::class, 'color']);
    Route::post('/admin/add-to-category', [CategoryController::class, 'addcategory']);
    Route::post('/admin/update-to-category', [CategoryController::class, 'updatecategory']);
    Route::post('/admin/update-to-subcategory', [CategoryController::class, 'updatesubcategory']);
    Route::post('/admin/update-to-secondsub', [CategoryController::class, 'updatesecondsub']);
    Route::post('/admin/update-to-color', [CategoryController::class, 'updatecolor']);
    Route::post('/admin/update-to-ocasion', [CategoryController::class, 'updatecocasion']);
    Route::post('/admin/update-to-brand', [CategoryController::class, 'updatebrand']);
    Route::get('/admin/category', [CategoryController::class, 'categoryview']);
    Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/admin/add-to-occasion', [CategoryController::class, 'occasion']);
    Route::post('/admin/add-to-subcategory', [CategoryController::class, 'addsubcategory']);
    Route::get('/admin/subcategory', [CategoryController::class, 'subcategorybview']);

    Route::post('/admin/add-to-subtosubcategory', [CategoryController::class, 'subtosub']);
    Route::get('/admin/seconsub', [CategoryController::class, 'seconsubview']);


    Route::post('/admin/add-to-brand', [CategoryController::class, 'brand']);
    Route::get('/admin/brand', [CategoryController::class, 'brandview']);

    Route::get('/admin/boxcreate', function () {
        if (auth()->user()->utype == 'ADM') {
            return view('admin.action.boxcreate', ['url' => 'add']);
        } else {
            return redirect('/');
        }
    });
    Route::post('/admin/createbox', [boxcontroller::class, 'addbox']);
    Route::get('/admin/box', [boxcontroller::class, 'boxview']);
    Route::get('/admin/edit-box/{id}', [boxcontroller::class, 'boxedit']);
    Route::post('/admin/update-box', [boxcontroller::class, 'boxupdate']);


    Route::get('/admin/cardcreate', function () {
        if (auth()->user()->utype == 'ADM') {
            $category = cardcategory::all();
            return view('admin.action.addcard', ['url' => 'add', 'category' => $category]);
        } else {
            return redirect('/');
        }
    });
    Route::post('/admin/createcard', [carcontroller::class, 'addcard']);
    Route::get('/admin/card', [carcontroller::class, 'cardview']);
    Route::get('/admin/edit-card/{id}', [carcontroller::class, 'edit']);
    Route::post('/admin/update-card', [carcontroller::class, 'cardupdate']);
    Route::get('/admin/category-cards', [carcontroller::class, 'categorycard']);
    Route::post('/admin/add-ctegory-card', [carcontroller::class, 'addcardcategory']);
    Route::get('/admin/edit-card-category/{id}', [carcontroller::class, 'editcategory']);
    Route::post('/admin/update-card-category', [carcontroller::class, 'cardcategoryupdate']);
    Route::post('/admin/admin-remove-category', [carcontroller::class, 'remove']);

    Route::get('/admin/stickercreate', function () {
        if (auth()->user()->utype == 'ADM') {
            return view('admin.action.sticker', ['url' => 'add']);
        } else {
            return redirect('/');
        }
    });
    Route::get('/admin/sticker', [stickercontroller::class, 'stickerview']);
    Route::post('/admin/createsticker', [stickercontroller::class, 'addsicker']);
    Route::get('/admin/edit-sticker/{id}', [stickercontroller::class, 'edit']);
    Route::post('/admin/update-sticker', [stickercontroller::class, 'stickerupdate']);


    //product

    Route::get('/admin/addproduct', [productcontroller::class, 'view']);
    Route::get('/admin/editproduct/{id}', [productcontroller::class, 'editget'])->name('admin.editproduct');
    Route::get('/admin/product', [productcontroller::class, 'viewproduct']);
    Route::post('/admin/product-add', [productcontroller::class, 'save']);
    Route::post('/admin/product-edit', [productcontroller::class, 'update']);
    Route::post('/admin/admin-remove', [productcontroller::class, 'remove']);

    //ready to ship
    Route::get('/admin/addready-to-ship', [ReadytoshipController::class, 'index']);
    Route::post('/admin/createreadyoship', [ReadytoshipController::class, 'create']);
    Route::get('/admin/addready-to-ship/box', [ReadytoshipController::class, 'boxlist']);
    Route::post('/admin/createreadytoshipbox', [ReadytoshipController::class, 'createbox']);

    Route::get('/admin/ready-to-ship', [ReadytoshipController::class, 'view']);
    Route::get('/admin/edit-readytoship/{id}', [ReadytoshipController::class, 'edit']);
    Route::post('/admin/update-readytoship', [ReadytoshipController::class, 'update']);


    Route::get('/admin/ready-to-ship-box', [ReadytoshipController::class, 'viewbox']);
    Route::get('/admin/ready-edit-box/{id}', [ReadytoshipController::class, 'boxedit']);
    Route::post('/admin/update-radybox', [ReadytoshipController::class, 'boxupdate']);

    Route::get('/admin/gift-voucher', [GiftvoucherController::class, 'index']);
    Route::get('/admin/gift-voucher-list', [GiftvoucherController::class, 'Listvoucher']);
    Route::get('/admin/gift-voucher-edit/{id}', [GiftvoucherController::class, 'Editvoucher']);
    Route::post('/admin/add-voucher', [GiftvoucherController::class, 'store']);
    Route::get('/admin/gift-voucher-price', [GiftvoucherController::class, 'indexprice']);
    Route::post('/admin/add-voucher-price', [GiftvoucherController::class, 'storeprice']);
    Route::get('/admin/gift-voucherprice-list', [GiftvoucherController::class, 'Listvoucherprice']);
    Route::post('/admin/update-voucher', [GiftvoucherController::class, 'voucherupdate']);
    Route::get('/admin/gift-voucherprice-edit/{id}', [GiftvoucherController::class, 'Editvoucherprice']);
    Route::post('/admin/update-voucherprice', [GiftvoucherController::class, 'voucherpriceupdate']);

    //slider

    Route::get('/admin/add-home', function () {
        if (auth()->user()->utype == 'ADM') {
            $slider = slider::where('type', '=', 'top')->get();
            return view('admin.action.slider1', ['slider' => $slider, 'url' => 'add']);
        } else {
            return redirect('/');
        }
    });
    Route::get('/admin/add-fetuers', function () {
        if (auth()->user()->utype == 'ADM') {
            $feuter = fetuers::all();
            return view('admin.action.featuers', ['feuter' => $feuter, 'url' => 'add']);
        } else {
            return redirect('/');
        }
    });
    Route::post('/admin/add-home', [Frontendcontroller::class, 'store']);
    Route::post('/admin/add-fetuers', [Frontendcontroller::class, 'fetuers']);
    Route::get('/admin/add-home-middle', [Frontendcontroller::class, 'middleimage']);
    Route::get('/admin/partner', [Frontendcontroller::class, 'partner']);
    Route::get('/admin/edit-slider/{id}', [Frontendcontroller::class, 'editslider']);
    Route::post('/admin/update-slider', [Frontendcontroller::class, 'slideupdate']);
    Route::post('/admin/update-partner', [Frontendcontroller::class, 'partnerupdate']);
    Route::post('/admin/Logo', [Frontendcontroller::class, 'logo']);
    Route::get('/admin/edit-partner/{id}', [Frontendcontroller::class, 'editpartner']);
    Route::get('/admin/order-view/{id}', [ordercontrolle::class, 'view']);
    //fetuers
    Route::get('/admin/edit-fetuers/{id}', [Frontendcontroller::class, 'editfetuers']);
    Route::post('/admin/update-fetuers', [Frontendcontroller::class, 'fetuersupdate']);

    //users
    Route::get('/admin/users', [usercontroller::class, 'index']);
    Route::post('/admin/admin-active', [usercontroller::class, 'active']);
    Route::get('/admin/coparate', [Frontendcontroller::class, 'coparate']);
    Route::post('/admin/add-coparate', [Frontendcontroller::class, 'addimage']);
    Route::post('/admin/update-coparate', [Frontendcontroller::class, 'updatecoparate']);

    Route::get('/admin/about', [Frontendcontroller::class, 'about']);
    Route::post('/admin/add-about', [Frontendcontroller::class, 'addabout']);
    Route::post('/admin/update-about', [Frontendcontroller::class, 'updateabout']);
    Route::get('/admin/profile', [profilecontroller::class, 'profile']);
    Route::get('/admin/updatepassword', [profilecontroller::class, 'updatepassword']);
    Route::get('/admin/generlseting', [Genaralcontrolle::class, 'genaral']);
    Route::post('/admin/add-shiping', [Genaralcontrolle::class, 'shiping']);
    Route::get('/admin/orders', [ordercontrolle::class, 'orders']);
    Route::post('/admin/admin-order-action', [ordercontrolle::class, 'action']);
    Route::get('/admin/completeorder', [ordercontrolle::class, 'complete']);
    Route::get('/admin/cancelorder', [ordercontrolle::class, 'cancel']);
    Route::get('/admin/order-view-reports/{id}/{action}', [ordercontrolle::class, 'viewreport']);
    Route::post('/admin/search-report', [ordercontrolle::class, 'search']);
    Route::post('/admin/search-report-cancel', [ordercontrolle::class, 'searchcancel']);
    Route::get('/admin/coparte-orders', [ordercontrolle::class, 'coparete']);
});
Route::Post('/admin/add-image', [profilecontroller::class, 'profileimage']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
Route::Post('/admin/updateprofile', [profilecontroller::class, 'update']);
