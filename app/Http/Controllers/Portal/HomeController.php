<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\WidgetImageSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexPage()
    {
        $artikel=Content::with(['author'])->where('status','publish')->orderBy('created_at','desc')->limit(6)->get();
        $widget_img_slider = WidgetImageSlider::orderBy('created_at','desc')->get();
        $data['widget_img_slider']=$widget_img_slider;
        $data['list_artikel'] = $artikel;
        return view('portal.pages.home.index',$data);
    }
}
