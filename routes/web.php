<?php

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

use App\GiftCard;
use App\Category;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/base/{id}', function($id){

    $g = GiftCard::find($id);

    return $g->id;
});

Route::get('/faker', function () {

    $faker = Faker\Factory::create();

    $arr = [
        'name' => [],
        'company' => [],
        'image' => []

    ];
    for($i = 0; $i <= 20; $i++)
    {
        array_push($arr['name'], $faker->name);
        array_push($arr['company'], $faker->company);
        array_push($arr['image'], $faker->imageUrl(500, 500, 'cats'));
    }

    return dd($arr);
});

Route::get('/mypage', function(){

    $arr = [];

    $arr['user'] = Auth::user();
    $arr['is'] = Auth::id();
    $arr['authed'] = Auth::check();

    return dd($arr);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('api')->group(function(){
    Route::get('items/{from}/{amount?}',function($from, $amount = 10){
        $giftcards = GiftCard::skip($from-1)->take($amount)->get();

        $items = [];
        foreach($giftcards as $giftcard)
        {
            $result = [
                'id' => $giftcard->id,
                'name' => $giftcard->name,
                'price' => $giftcard->price
            ];

            array_push($items,$result);
        }

        return response()->json($items);
    })->where(['from' => '[0-9]+','amount' => '[0-9]+']);

    Route::get('detailed/{item}',function($item){
        
    })->where(['item' => '[0-9]+']);
});
