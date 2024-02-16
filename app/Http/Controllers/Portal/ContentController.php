<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentView;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function indexPage(Request $request)
    {
        $artikel = Content::with(['author'])->withCount('viewers')->where('status', 'publish')->orderBy('created_at', 'desc')->paginate(10);
        $data['list_artikel'] = $artikel;
        return view('portal.pages.artikel.index', $data);
    }

    public function detailPage(Request $request,$id)
    {
        $artikel = Content::with(['author'])->withCount('viewers')->find($id);
        if (!$artikel) {
            abort(404);
        }
        $content_view=ContentView::where('ip',$request->getClientIp())->where('content_id',$id)->exists();
        if(!$content_view){
            $views=new ContentView();
            $views->ip=$request->getClientIp();
            $views->content_id=$id;
            $views->save();
        }

        $data['artikel'] = $artikel;
        return view('portal.pages.artikel.detail', $data);
    }
}
