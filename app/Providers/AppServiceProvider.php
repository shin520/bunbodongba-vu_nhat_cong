<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Fshare;
use App\Models\ProductCategory1;
use App\Models\Policy;
use App\Models\Product;
use App\Models\Page;
use App\Models\Branch;
use App\Models\StaticContent;
use View;
use Carbon\Carbon;
use App\Models\Setting;
use Jenssegers\Agent\Agent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('vi');
        $setting = Setting::first();
        View::share('setting',$setting);
        $menu = ProductCategory1::orderby('number','asc')->orderby('id','desc')->where('hideshow',1)->get();
        View::share('menu',$menu);
        $hot = Product::where('featured',true)->where('hideshow',true)->orderby('number','asc')->orderby('id','desc')->get();
        View::share('hot',$hot);
        $free_course = Page::where('type','course')->first();
        View::share('free_course',$free_course);
        $static['about_footer'] = StaticContent::where('type','about_footer')->first();
        View::share('static',$static);
        $share['branch'] = Branch::where('featured', '1')->orderBy('number', 'ASC')->orderBy('id', "desc")->limit(3)->get();
        $share['about_menu'] = Page::where('type', 'about')->first();
        $share['contact_menu'] = Page::where('type', 'contact')->first();
        $share['all_product_menu'] = Page::where('type', 'all-product')->first();
        $share['all_post_menu'] = Page::where('type', 'all-post')->first();
        View::share('share',$share);
        $policy_list['policy_list'] = Policy::where('featured', '1')->orderBy('number', 'ASC')->orderBy('id', "desc")->limit(4)->get();
        View::share('policy_list',$policy_list);
        

    }
}
