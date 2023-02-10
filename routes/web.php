<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ZonesController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\TownsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ShopClassesController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\ShopSubcategoryController;
use App\Http\Controllers\UserroleController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::view('user_roles', 'users.user_roles');
   
    Route::view('companies', 'masterdata.companies.companies')->name('masterdata.companies.companies');//company view route
    
    Route::view('clients', 'masterdata.clients.clients')->name('masterdata.clients.clients');//clients view route
   
    Route::view('countries', 'masterdata.countries.countries')->name('masterdata.countries.countries');//countries view route
   
    Route::view('cities', 'masterdata.cities.cities')->name('masterdata.cities.cities');//city view Route
    
    Route::view('zones', 'masterdata.zones.zones')->name('masterdata.zones.zones');//zones view route

    Route::view('regions', 'masterdata.regions.regions')->name('masterdata.regions.regions');//regions view route

    Route::view('areas', 'masterdata.areas.areas')->name('masterdata.area.sareas');

    Route::view('towns', 'masterdata.towns.towns')->name('masterdata.towns.towns');

    Route::view('routes', 'masterdata.routes.routes')->name('masterdata.routes.routes');

    Route::view('categories', 'products.product_categories.categories')->name('products.product_categories.categories');

    Route::view('subcategories', 'products.product_subcategories.subcategories')->name('products.product_subcategories.subcategories');
  
    Route::view('products', 'products.product.products')->name('products.product.products');

    Route::view('shops', 'market.shops.shops')->name('market.shops.shops');

    Route::view('add_shop', 'market.shops.add_shop')->name('market.shops.add_shop');

    Route::view('channels', 'market.channels.channels')->name('market.channels.channels');

    Route::view('classes', 'market.classes.classes')->name('market.classes.classes');

    Route::view('shop_categories', 'market.shop_categories.shop_categories')->name('market.shop_categories.shop_categories');

    Route::view('shop_subcategories', 'market.shop_subcategories.shop_subcategories')->name('market.shop_subcategories.shop_subcategories');
    



    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


    Route::get('companies', [CompaniesController::class, 'show_companies']);//show company controller class
    Route::get('companies/{id}', [CompaniesController::class, 'edit_company']);//edit company controller class
    Route::post('companies/store', [CompaniesController::class, 'store']);//update company data controller class
    Route::delete('companies/delete/{id}', [CompaniesController::class, 'delete']);//delete company controller class

    Route::get('clients', [ClientController::class, 'show_clients']);//show clients controller class
    Route::get('clients/edit/{id}', [ClientController::class, 'edit_client']);//edit client controller class
    Route::post('clients/store', [ClientController::class, 'store_client']);//update client controller class
    Route::delete('clients/delete/{id}', [ClientController::class, 'delete_client']);//delete client controller class

    Route::get('countries', [CountriesController::class, 'show_countries']);//show countries controller class
    Route::get('countries/edit/{id}', [CountriesController::class, 'edit_country']);//add country controller class
    Route::post('countries/store', [CountriesController::class, 'store_country']);//update country controller class
    Route::delete('countries/delete/{id}', [CountriesController::class, 'delete_country']);//delete country controller class

    
    Route::get('cities', [CitiesController::class, 'show_cities'])->name('city.cities');
    Route::get('cities/edit/{id}', [CitiesController::class, 'edit_city'])->name('city.add_city');//to view cities in form
    Route::post('cities/store', [CitiesController::class, 'store']);
    Route::delete('cities/delete/{id}', [CitiesController::class, 'delete_city']);

    Route::get('zones', [ZonesController::class, 'show_zones']);//show zones controller class
    Route::get('zones/edit/{id}', [ZonesController::class, 'edit_zone']);//edit zone controller class
    Route::post('zones/store', [ZonesController::class, 'store']);//update zone controller class
    Route::delete('zones/delete/{id}', [ZonesController::class, 'delete_zone']);//delete zone controller class

    Route::get('regions', [RegionsController::class, 'show_regions']);//show regions controller class
    Route::get('regions/edit/{id}', [RegionsController::class, 'edit_region']);
    Route::post('regions/store', [RegionsController::class, 'store']);
    Route::delete('regions/delete/{id}', [RegionsController::class, 'delete_region']);

    Route::get('areas', [AreasController::class, 'show_areas']);//show regions controller class
    Route::get('areas/edit/{id}', [AreasController::class, 'edit_area']);
    Route::post('areas/store', [AreasController::class, 'store']);
    Route::delete('areas/delete/{id}', [AreasController::class, 'delete_area']);

    Route::get('towns', [TownsController::class, 'show_towns']);//show regions controller class
    Route::get('towns/edit/{id}', [TownsController::class, 'edit_town']);
    Route::post('towns/store', [TownsController::class, 'store']);
    Route::delete('towns/delete/{id}', [TownsController::class, 'delete_town']);

    Route::get('routes', [RoutesController::class, 'show_routes']);//show regions controller class
    Route::get('routes/edit/{id}', [RoutesController::class, 'edit_route']);
    Route::post('routes/store', [RoutesController::class, 'store']);
    Route::delete('routes/delete/{id}', [RoutesController::class, 'delete_route']);


    Route::get('categories', [CategoriesController::class, 'show_categories']);
    Route::get('categories/edit/{id}', [CategoriesController::class, 'edit_category']);
    Route::post('categories/store', [CategoriesController::class, 'store']);
    Route::delete('category/delete/{id}', [CategoriesController::class, 'delete_category']);


    Route::get('subcategories', [SubcategoriesController::class, 'show_subcategories']);
    Route::get('subcategories/edit/{id}', [SubcategoriesController::class, 'edit_subcategory']);
    Route::post('subcategories/store', [SubcategoriesController::class, 'store']);
    Route::delete('subcategories/delete/{id}', [SubcategoriesController::class, 'delete_subcategories']);

    Route::get('products', [ProductController::class, 'show_products']);
    Route::get('products/change/{id}', [ProductController::class, 'change_cate']);
    Route::get('products/edit/{id}', [ProductController::class, 'edit_product']);
    Route::post('products/store', [ProductController::class, 'store']);
    Route::delete('products/delete/{id}', [ProductController::class, 'delete_product']);

    Route::get('shops', [ShopController::class, 'show_shops']);
    Route::get('add_shop',[ShopController::class, 'add_shop']);
    Route::post('store', [ShopController::class, 'store_shop']);
    Route::get('add_shop/{id}',[ShopController::class, 'add_shop']);
    Route::post('add_shop/store', [ShopController::class, 'store_shop']);
    Route::get('shop_category/change/{id}', [ShopController::class, 'change_category_shop']);

    Route::get('channels', [ChannelController::class, 'show_channels']);
    Route::get('channels/edit/{id}', [ChannelController::class, 'edit_channel']);
    Route::post('channels/store', [ChannelController::class, 'store']);
    Route::delete('channels/delete/{id}', [ChannelController::class, 'delete_channel']);


    Route::get('classes', [ShopClassesController::class, 'show_classes']);
    Route::get('class/edit/{id}', [ShopClassesController::class, 'class_edit']);
    Route::post('class/store', [ShopClassesController::class, 'store']);
    Route::delete('class/delete/{id}', [ShopClassesController::class, 'class_delete']);

    Route::get('shop_categories', [ShopCategoryController::class, 'show_shop_categories']);
    Route::get('shop_category/edit/{id}', [ShopCategoryController::class, 'edit_shop_category']);
    Route::post('shop_category/store', [ShopCategoryController::class, 'store']);
    Route::delete('shop_category/delete/{id}', [ShopCategoryController::class, 'delete_shop_category']);

    Route::get('shop_subcategories', [ShopsubcategoryController::class, 'show_shop_subcategories']);
    Route::get('shop_subcategory/edit/{id}', [ShopsubcategoryController::class, 'edit_shop_subcategory']);
    Route::post('shop_subcategory/store', [ShopsubcategoryController::class, 'store']);
    Route::delete('shop_subcategory/delete/{id}', [ShopsubcategoryController::class, 'delete_shop_subcategory']);


    Route::get('user_roles', [UserroleController::class, 'show_user_roles']);
    Route::get('user_roles/edit/{id}', [UserroleController::class, 'edit_user_role']);
    Route::post('user_roles/store', [UserroleController::class, 'store']);
});

