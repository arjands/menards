<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Sitemap;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/sitemap', function (Request $request) {

    if(request()->filled('slug')){
        $slug = request()->query('slug');
        $slugs = Sitemap::query()->where('producturl', 'LIKE', '%'.$slug.'%')->get();
        return $slugs;
    }
    return ["not"];
});
