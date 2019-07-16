<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
//use App\Category;
use App\Field;
use App\Busines;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        /*view()->composer('nav', function ($view) {
            //
            $categories = Category::all();
            $view->with("categories",$categories);
        });*/

        view()->composer('business.index', function ($view) {
            //
            $id = \Auth::user()->id;
            $busines = Busines::where('id', $id)->first();
            //dd($id,$empresa);
            $canchas = DB::table('fields')->where('busines_id','LIKE',"%$busines->id%")->get();
            //dd($id,$empresa,$canchas);
            $view->with("canchas",$canchas)->with("busines",$busines);
        });

        /*view()->composer('customers.index', function ($view) {
            //
            $id = \Auth::user()->id;
            $busines = Busines::where('id', $id)->first();
            //dd($id,$empresa);
            $canchas = DB::table('fields')->where('busines_id','LIKE',"%$busines->id%")->get();
            //dd($id,$empresa,$canchas);
            $view->with("canchas",$canchas)->with("busines",$busines);
        });*/

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}