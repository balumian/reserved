<?php

use App\Http\Controllers\Admin\ActivitiesAttractionController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Business\BusinessController as Business;
use App\Http\Controllers\Admin\BusinessPackageController;
use App\Http\Controllers\Admin\BusinessTypesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CuisinesController;
use App\Http\Controllers\Admin\EmiratesController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Business\BusinessSetupController;
use App\Http\Controllers\Business\BusinessProfileController;
use App\Http\Controllers\Business\CapacityController;
use App\Http\Controllers\Business\OpeningController;
use App\Http\Controllers\Business\SlotsController;
use App\Http\Controllers\Business\BusinessSettingsController;
use App\Http\Controllers\Business\MenuGroupController;
use App\Http\Controllers\Business\MenuController;
use App\Http\Controllers\Business\PerksController;
use App\Http\Controllers\Business\TablesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/join-now', function(){
    return view('join-now');
})->name('join-now');

Route::get('/about-us', function(){
    return view('about-us');
})->name('about-us');

Route::get('/contact-us', function(){
    return view('contact-us');
})->name('contact-us');

Route::get('/faq', function(){
    return view('faq');
})->name('faq');

Route::get('/terms-conditions', function(){
    return view('terms-conditions');
})->name('terms-conditions');

Route::get('/privacy-policy', function(){
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/activities-attraction', function(){
    return view('activities-attraction');
})->name('activities-attraction');

Route::get('/activities-attraction/detail', function(){
    return view('activities-detail');
})->name('activities-detail');

Route::get('/restaurants/listing', function(){
    return view('restaurants-listing');
})->name('restaurants-listing');

Route::get('/restaurants/detail', function(){
    return view('restaurant-detail');
})->name('restaurant-detail');


Route::middleware(['guest'])->group(function () {

    Route::get('/backend', function () {
        return view('admin.login');
    });
    Route::get('/business/signup', [Business::class, 'index'])->name('business.signup');
    Route::post('/business/store/step1', [Business::class, 'step1'])->name('business.step1'); // step1
    Route::post('/business/store/step2', [Business::class, 'step2'])->name('business.step2'); // step2
    Route::post('/business/store/step3', [Business::class, 'step3'])->name('business.step3'); // step3
    Route::post('/business/store', [Business::class, 'step4'])->name('business.step4'); // step3

});


Route::post('/get-specific-areas', [AreasController::class, 'get_specific_areas'])->name('get.specific.areas');


//Admin Routes 
Route::prefix('admin')->middleware(['auth', 'verified', 'isAdmin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Customers
    Route::get('/customers-list', [CustomerController::class, 'index'])->name('customer.list'); //List
    Route::get('/new-customer', [CustomerController::class, 'new_customer'])->name('customer.add'); //Add
    Route::post('/new-customer', [CustomerController::class, 'save_customer'])->name('customer.save'); //Save
    Route::post('/delete/customer', [CustomerController::class, 'delete_customer'])->name('customer.delete'); //Delete
    Route::get('/view/{id}/customer', [CustomerController::class, 'view_customer'])->name('customer.view'); //View
    Route::get('/edit/{id}/customer', [CustomerController::class, 'edit_customer'])->name('customer.edit'); //View
    Route::post('/update/customer', [CustomerController::class, 'update_customer'])->name('customer.update'); //Update
    Route::post('/update/password', [CustomerController::class, 'update_password'])->name('customer.password'); //Update Password

    // Config Route

    // Countries
    Route::get('/countries', [CountriesController::class, 'index'])->name('admin.countries'); //View
    Route::get('/country/add', [CountriesController::class, 'create'])->name('admin.country.create'); //new
    Route::post('/country/store', [CountriesController::class, 'store'])->name('admin.country.store'); //store
    Route::get('/country/{id}/edit', [CountriesController::class, 'show'])->name('admin.country.show'); //show
    Route::post('/country/update', [CountriesController::class, 'edit'])->name('admin.country.edit'); //edit
    Route::post('/country/delete', [CountriesController::class, 'destroy'])->name('admin.country.destroy'); //update
    Route::post('/country/bulk', [CountriesController::class, 'bulk_destroy'])->name('admin.country.bulk'); //Bulk Delete

    // Cuisines
    Route::get('/cuisines', [CuisinesController::class, 'index'])->name('admin.cuisines'); //List
    Route::get('/cuisines/create', [CuisinesController::class, 'create'])->name('admin.cuisines.create'); //Create
    Route::post('/cuisines/store', [CuisinesController::class, 'store'])->name('admin.cuisines.store'); //Store
    Route::get('/cuisines/{id}/edit', [CuisinesController::class, 'edit'])->name('admin.cuisines.edit'); //Edit
    Route::post('/cuisines/update', [CuisinesController::class, 'update'])->name('admin.cuisines.update'); //Update
    Route::post('/cuisines/delete', [CuisinesController::class, 'destroy'])->name('admin.cuisines.delete'); //Delete
    Route::post('/cuisines/bulk', [CuisinesController::class, 'bulk_destroy'])->name('admin.cuisines.bulk'); //Bulk Delete

    // Themes
    Route::get('/themes', [ThemeController::class, 'index'])->name('admin.themes'); //List
    Route::get('/themes/create', [ThemeController::class, 'create'])->name('admin.themes.create'); //Create
    Route::post('/themes/store', [ThemeController::class, 'store'])->name('admin.themes.store'); //Store
    Route::get('/themes/{id}/edit', [ThemeController::class, 'edit'])->name('admin.themes.edit'); //Edit
    Route::post('/themes/update', [ThemeController::class, 'update'])->name('admin.themes.update'); //Update
    Route::post('/themes/delete', [ThemeController::class, 'destroy'])->name('admin.themes.delete'); //Delete
    Route::post('/themes/bulk', [ThemeController::class, 'bulk_destroy'])->name('admin.themes.bulk'); //Bulk Delete

    // Amenities
    Route::get('/amenities', [AmenitiesController::class, 'index'])->name('admin.amenities'); //List
    Route::get('/amenities/create', [AmenitiesController::class, 'create'])->name('admin.amenities.create'); //Create
    Route::post('/amenities/store', [AmenitiesController::class, 'store'])->name('admin.amenities.store'); //Store
    Route::get('/amenities/{id}/edit', [AmenitiesController::class, 'edit'])->name('admin.amenities.edit'); //Edit
    Route::post('/amenities/update', [AmenitiesController::class, 'update'])->name('admin.amenities.update'); //Update
    Route::post('/amenities/delete', [AmenitiesController::class, 'destroy'])->name('admin.amenities.delete'); //Delete
    Route::post('/amenities/bulk', [AmenitiesController::class, 'bulk_destroy'])->name('admin.amenities.bulk'); //Bulk Delete


    // Experiences
    Route::get('/experience', [ExperienceController::class, 'index'])->name('admin.experience'); //List
    Route::get('/experience/create', [ExperienceController::class, 'create'])->name('admin.experience.create'); //Create
    Route::post('/experience/store', [ExperienceController::class, 'store'])->name('admin.experience.store'); //Store
    Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('admin.experience.edit'); //Edit
    Route::post('/experience/update', [ExperienceController::class, 'update'])->name('admin.experience.update'); //Update
    Route::post('/experience/delete', [ExperienceController::class, 'destroy'])->name('admin.experience.delete'); //Delete
    Route::post('/experience/bulk', [ExperienceController::class, 'bulk_destroy'])->name('admin.experience.bulk'); //Bulk Delete

    // Features
    Route::get('/feature', [FeatureController::class, 'index'])->name('admin.feature'); //List
    Route::get('/feature/create', [FeatureController::class, 'create'])->name('admin.feature.create'); //Create
    Route::post('/feature/store', [FeatureController::class, 'store'])->name('admin.feature.store'); //Store
    Route::get('/feature/{id}/edit', [FeatureController::class, 'edit'])->name('admin.feature.edit'); //Edit
    Route::post('/feature/update', [FeatureController::class, 'update'])->name('admin.feature.update'); //Update
    Route::post('/feature/delete', [FeatureController::class, 'destroy'])->name('admin.feature.delete'); //Delete
    Route::post('/feature/bulk', [FeatureController::class, 'bulk_destroy'])->name('admin.feature.bulk'); //Bulk Delete

    // Emirates
    Route::get('/emirate', [EmiratesController::class, 'index'])->name('admin.emirate'); //List
    Route::get('/emirate/create', [EmiratesController::class, 'create'])->name('admin.emirate.create'); //Create
    Route::post('/emirate/store', [EmiratesController::class, 'store'])->name('admin.emirate.store'); //Store
    Route::get('/emirate/{id}/edit', [EmiratesController::class, 'edit'])->name('admin.emirate.edit'); //Edit
    Route::post('/emirate/update', [EmiratesController::class, 'update'])->name('admin.emirate.update'); //Update
    Route::post('/emirate/delete', [EmiratesController::class, 'destroy'])->name('admin.emirate.destroy'); //Edit
    Route::post('/emirate/bulk', [EmiratesController::class, 'bulk_destroy'])->name('admin.emirate.bulk'); //Bulk Delete



    // Business Types
    Route::get('/business-types', [BusinessTypesController::class, 'index'])->name('admin.business.type'); //List
    Route::get('/business-type/create', [BusinessTypesController::class, 'create'])->name('admin.business.type.create'); //Create
    Route::post('/business-type/store', [BusinessTypesController::class, 'store'])->name('admin.business.type.store'); //Store
    Route::get('/business-type/{id}/edit', [BusinessTypesController::class, 'edit'])->name('admin.business.type.edit'); //Edit
    Route::post('/business-type/update', [BusinessTypesController::class, 'update'])->name('admin.business.type.update'); //Update
    Route::post('/business-type/delete', [BusinessTypesController::class, 'destroy'])->name('admin.business.type.delete'); //Edit

    // Business Packages
    Route::get('/business-package', [BusinessPackageController::class, 'index'])->name('admin.business.package'); //List
    Route::get('/business-package/create', [BusinessPackageController::class, 'create'])->name('admin.business.package.create'); //Create
    Route::post('/business-package/store', [BusinessPackageController::class, 'store'])->name('admin.business.package.store'); //Store
    Route::get('/business-package/{id}/view', [BusinessPackageController::class, 'show'])->name('admin.business.package.show'); //View
    Route::get('/business-package/{id}/edit', [BusinessPackageController::class, 'edit'])->name('admin.business.package.edit'); //Edit
    Route::post('/business-package/update', [BusinessPackageController::class, 'update'])->name('admin.business.package.update'); //Update
    Route::post('/business-package/delete', [BusinessPackageController::class, 'destroy'])->name('admin.business.package.delete'); //Edit
    Route::post('/business-package/bulk', [BusinessPackageController::class, 'bulk_destroy'])->name('admin.business.package.bulk'); //Bulk Delete

    // Areas
    Route::get('/areas', [AreasController::class, 'index'])->name('admin.areas'); //List
    Route::get('/areas/create', [AreasController::class, 'create'])->name('admin.areas.create'); //Create
    Route::post('/areas/store', [AreasController::class, 'store'])->name('admin.areas.store'); //Store
    Route::get('/areas/{id}/edit', [AreasController::class, 'edit'])->name('admin.areas.edit'); //Edit
    Route::post('/areas/update', [AreasController::class, 'update'])->name('admin.areas.update'); //Update
    Route::post('/areas/delete', [AreasController::class, 'destroy'])->name('admin.areas.delete'); //Delete
    Route::post('/areas/bulk', [AreasController::class, 'bulk_destroy'])->name('admin.areas.bulk'); //Bulk Delete

    // Menu Category
    Route::get('/menu/category', [MenuCategoryController::class, 'index'])->name('admin.menu.category'); // List
    Route::get('/menu/category/create', [MenuCategoryController::class, 'create'])->name('admin.menu.category.create'); // Create
    Route::post('/menu/category/store', [MenuCategoryController::class, 'store'])->name('admin.menu.category.store'); // Create
    Route::get('/menu/category/{id}/edit', [MenuCategoryController::class, 'edit'])->name('admin.menu.category.edit'); // Edit
    Route::post('/menu/category/update', [MenuCategoryController::class, 'update'])->name('admin.menu.category.update'); // Update
    Route::post('/menu/category/delete', [MenuCategoryController::class, 'destroy'])->name('admin.menu.category.delete'); // Delete
    Route::post('/menu/category/bulk', [MenuCategoryController::class, 'bulk_destroy'])->name('admin.menu.category.bulk'); // Bulk Delete

    // Attractions
    Route::get('/attractions', [ActivitiesAttractionController::class, 'index'])->name('admin.attractions'); //List
    Route::get('/attraction/create', [ActivitiesAttractionController::class, 'create'])->name('admin.attraction.create'); //Create
    Route::post('/attraction/store', [ActivitiesAttractionController::class, 'store'])->name('admin.attraction.store'); //Store
    Route::get('/attractions/{id}/view', [ActivitiesAttractionController::class, 'show'])->name('admin.attraction.show'); //Show
    Route::get('/attractions/{id}/edit', [ActivitiesAttractionController::class, 'edit'])->name('admin.attraction.edit'); //Edit
    Route::post('/attraction/update', [ActivitiesAttractionController::class, 'update'])->name('admin.attraction.update'); //Update
    Route::post('/attraction/delete', [ActivitiesAttractionController::class, 'destroy'])->name('admin.attraction.delete'); //Edit
    Route::post('/attraction/bulk', [ActivitiesAttractionController::class, 'bulk_destroy'])->name('admin.attraction.bulk'); //Bulk Delete



    // Business Management

    Route::get('/businesses', [BusinessController::class, 'index'])->name('admin.business'); // Create
    Route::get('/business/create', [BusinessController::class, 'create'])->name('admin.business.create'); // Create
    Route::post('/business/store/step1', [BusinessController::class, 'step1'])->name('admin.business.step1'); // step1
    Route::post('/business/store/step2', [BusinessController::class, 'step2'])->name('admin.business.step2'); // step2
    Route::post('/business/store/step3', [BusinessController::class, 'step3'])->name('admin.business.step3'); // step3
    Route::post('/business/store', [BusinessController::class, 'step4'])->name('admin.business.step4'); // store
    Route::get('/businesses/{id}/view', [BusinessController::class, 'show'])->name('admin.business.show'); // show
    Route::get('/businesses/{id}/edit', [BusinessController::class, 'edit'])->name('admin.business.edit'); // edit
    Route::post('/business/delete', [BusinessController::class, 'destroy'])->name('admin.business.delete'); //Delete
    Route::post('/business/bulk', [BusinessController::class, 'bulk_destroy'])->name('admin.business.bulk'); //Bulk Delete
    Route::post('/business/profile/update', [BusinessController::class, 'profile_update'])->name('admin.business.profile.update'); //Profile Update
    Route::post('/business/password/update', [BusinessController::class, 'password_update'])->name('admin.business.password.update'); //Password Change
    Route::post('/business/cover/update', [BusinessController::class, 'cover_update'])->name('admin.business.cover.update'); //Cover Change
    Route::post('/business/avatar/update', [BusinessController::class, 'avatar_update'])->name('admin.business.avatar.update'); //Logo Change
    Route::post('/account/status/update', [BusinessController::class, 'account_status_update'])->name('admin.account.status.update'); //Account Statusadmin.business.documents.update
    Route::post('/business/status/update', [BusinessController::class, 'business_status_update'])->name('admin.business.status.update'); //Business Status
    Route::post('/business/document/update', [BusinessController::class, 'business_document_update'])->name('admin.business.documents.update'); //Business Status
    Route::post('/business/custom/package', [BusinessController::class, 'business_custom_package'])->name('admin.business.custom.package'); //Business Status
    Route::post('/business/update/package', [BusinessController::class, 'business_update_package'])->name('admin.business.package.change'); //Business Status
    


    // System Settings
    Route::get('/smtp-setting', [SystemController::class, 'smtp_show'])->name('admin.system.smtp.show'); //smtp show
});


// Business Routes
Route::get('/business', function(){
    return redirect()->route('business.dashboard');
});

Route::prefix('business')->middleware(['auth', 'verified'])->group(function () {

    // Approved Business Routes
    Route::middleware(['isBusiness'])->group(function () {
        Route::get('/dashboard', [Business::class, 'dashboard'])->name('business.dashboard');
        Route::get('/profile', [BusinessSetupController::class, 'index'])->name('business.profile');
        Route::post('/gallery', [BusinessSetupController::class, 'index'])->name('business.gallery');
        Route::get('/accounts', [BusinessProfileController::class, 'index'])->name('business.account');
        Route::post('/account/update', [BusinessProfileController::class, 'update'])->name('business.account.update');
        Route::post('/password/update', [BusinessProfileController::class, 'password_update'])->name('business.password.update');
        Route::get('/slots', [SlotsController::class, 'index'])->name('business.slots');
        Route::get('/slots/create', [SlotsController::class, 'create'])->name('business.slots.create');
        Route::post('/business/settings', [BusinessSetupController::class, 'settings'])->name('business.settings.update');
        Route::post('/package/request', [BusinessSetupController::class, 'package_change_request'])->name('business.package.change.request');
        Route::post('/package/select', [BusinessSetupController::class, 'package_select'])->name('business.package.select');
  
        Route::post('/cover/update', [BusinessSetupController::class, 'business_cover_update'])->name('business.cover.update');  
        Route::post('/avatar/update', [BusinessSetupController::class, 'avatar_update'])->name('business.avatar.update'); //Logo Change
        Route::post('/document/update', [BusinessSetupController::class, 'document_update'])->name('business.documents.update'); //Business Status
        Route::post('/bio/update', [BusinessSetupController::class, 'bio_update'])->name('business.bio.update'); //Business Status
        Route::post('/business/package', [BusinessSetupController::class, 'business_package'])->name('business.get.package'); //Business Status
        // Business Settings
        Route::post('/update/details', [BusinessSettingsController::class, 'business_update_details'])->name('business.update.details');
        // Opening & Closing Routes
        Route::get('/opening', [OpeningController::class, 'index'])->name('business.opening'); // List
        Route::get('/opening/create', [OpeningController::class, 'create'])->name('business.opening.create'); // Create
        Route::post('/opening/store', [OpeningController::class, 'store'])->name('business.opening.store'); // Store
        Route::get('/opening/{id}/edit', [OpeningController::class, 'edit'])->name('business.opening.edit');    // Edit
        Route::post('/opening/update', [OpeningController::class, 'update'])->name('business.opening.update'); // Update
        Route::post('/opening/delete', [OpeningController::class, 'destroy'])->name('business.opening.delete'); // Delete
        Route::post('/opening/bulk', [OpeningController::class, 'bulk_destroy'])->name('business.opening.bulk'); //Bulk Delete

        // Business Booking Capacity
        Route::get('/capacity', [CapacityController::class, 'index'])->name('business.capacity'); // List
        Route::get('/capacity/create', [CapacityController::class, 'create'])->name('business.capacity.create'); // Create
        Route::post('/capacity/store', [CapacityController::class, 'store'])->name('business.capacity.store'); // Create
        Route::get('/capacity/{id}/edit', [CapacityController::class, 'edit'])->name('business.capacity.edit'); // Create
        Route::post('/capacity/update', [CapacityController::class, 'update'])->name('business.capacity.update'); // Create
        Route::post('/capacity/delete', [CapacityController::class, 'destroy'])->name('business.capacity.delete'); // Delete
        Route::post('/capacity/bulk', [CapacityController::class, 'bulk_destroy'])->name('business.capacity.bulk'); //Bulk Delete

        // Menu Groups

        Route::get('/menu/groups',[MenuGroupController::class,'index'])->name('business.menu.groups');
        Route::get('/menu/groups/create',[MenuGroupController::class,'create'])->name('business.menu.groups.create');
        Route::post('/menu/groups/store',[MenuGroupController::class,'store'])->name('business.menu.groups.store');
        Route::get('/menu/groups/{id}/edit',[MenuGroupController::class,'edit'])->name('business.menu.groups.edit');
        Route::post('/menu/groups/update',[MenuGroupController::class,'update'])->name('business.menu.groups.update');
        Route::post('/menu/groups/delete', [MenuGroupController::class, 'destroy'])->name('business.menu.groups.delete'); // Delete
        Route::post('/menu/groups/bulk', [MenuGroupController::class, 'bulk_destroy'])->name('business.menu.groups.bulk'); //Bulk Delete

        // Menu
        Route::get('/menus',[MenuController::class,'index'])->name('business.menus');
        Route::get('/menus/create',[MenuController::class,'create'])->name('business.menu.create');
        Route::post('/menus/store',[MenuController::class,'store'])->name('business.menu.store');
        Route::get('/menus/{id}/edit',[MenuController::class,'edit'])->name('business.menu.edit');
        Route::post('/menus/update',[MenuController::class,'update'])->name('business.menu.update');
        Route::post('/menus/delete', [MenuController::class, 'destroy'])->name('business.menu.delete'); // Delete
        Route::post('/menus/bulk', [MenuController::class, 'bulk_destroy'])->name('business.menu.bulk'); //Bulk Delete

        // Tables
        Route::get('/tables',[TablesController::class,'index'])->name('business.tables');
        Route::get('/table/create',[TablesController::class,'create'])->name('business.tables.create');
        Route::post('/tables/store',[TablesController::class,'store'])->name('business.tables.store');
        Route::get('/tables/{id}/edit',[TablesController::class,'edit'])->name('business.tables.edit');
        Route::post('/tables/update',[TablesController::class,'update'])->name('business.tables.update');
        Route::post('/tables/delete', [TablesController::class, 'destroy'])->name('business.tables.delete'); // Delete
        Route::post('/tables/bulk', [TablesController::class, 'bulk_destroy'])->name('business.tables.bulk'); //Bulk Delete

        // Perks
        Route::get('/perks',[PerksController::class,'index'])->name('business.perks');
        Route::get('/perk/create',[PerksController::class,'create'])->name('business.perks.create');
        Route::post('/perks/store',[PerksController::class,'store'])->name('business.perks.store');
        Route::get('/perks/{id}/edit',[PerksController::class,'edit'])->name('business.perks.edit');
        Route::post('/perks/update',[PerksController::class,'update'])->name('business.perks.update');
        Route::post('/perks/delete', [PerksController::class, 'destroy'])->name('business.perks.delete'); // Delete
        Route::post('/perks/bulk', [PerksController::class, 'bulk_destroy'])->name('business.perks.bulk'); //Bulk Delete
    });
    //End Approved Business Routes 

    // Route::get('/pending', [Business::class, 'pending'])->name('business.pending');
    Route::get('/logout', [Business::class, 'logout'])->name('business.logout');
});

// Customer User Route
Route::middleware(['auth', 'verified', 'isCustomer'])->group(function () {

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // get routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    // Remove avatar
    Route::get('/remove-avatar', [ProfileController::class, 'remove_avatar'])->name('profile.avatar');

    Route::get('/interests', function (Request $request) {
        return view('frontend.interests',[
            'profile' => $request->user()->profile,
        ]);
    })->name('interests');

    Route::get('/offers', function (Request $request) {
        return view('frontend.offers',[
            'profile' => $request->user()->profile,
        ]);
    })->name('offers');

    Route::get('/favourites', function (Request $request) {
        return view('frontend.favourites',[
            'profile' => $request->user()->profile,
        ]);
    })->name('favourites');

    Route::get('/reviews', function (Request $request) {
        return view('frontend.reviews',[
            'profile' => $request->user()->profile,
        ]);
    })->name('reviews');

    Route::get('/reservations', function (Request $request) {
        return view('frontend.reservations',[
            'profile' => $request->user()->profile,
        ]);
    })->name('reservations');
});

require __DIR__ . '/auth.php';
