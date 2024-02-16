<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WidgetImageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WidgetImageSliderController extends Controller
{
    public function indexPage()
    {
        return view('admin.pages.widget-image-slider.index');
    }

    public function list(Request $request)
    {
        $list = WidgetImageSlider::query();
        return datatables()->eloquent($list)->toJson();
    }

    public function addPage()
    {
        return view('admin.pages.widget-image-slider.add');
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $content = new WidgetImageSlider();
        $content->title = $request->judul;
        $content->description = $request->deskripsi;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $content->slug . '-' . $image->hashName();
            Storage::disk('media')->putFileAs('cover', $image, $filename);
            $content->image = $filename;
        }
        $content->save();

        return redirect('/admin/widget-image-slider')->with(['success' => 'Widget Konten ' . $request->judul . ' berhasil ditambahkan']);
    }

    public function editPage($id)
    {
        $content = WidgetImageSlider::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $data['content'] = $content;
        return view('admin.pages.widget-image-slider.update', $data);
    }

    public function edit(Request $request,$id)
    {
        $content = WidgetImageSlider::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $content->title = $request->judul;
        $content->description = $request->deskripsi;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $content->slug . '-' . $image->hashName();
            Storage::disk('media')->putFileAs('cover', $image, $filename);
            $content->image = $filename;
        }
        $content->save();

        return redirect('/admin/widget-image-slider')->with(['success' => 'Widget Konten ' . $request->judul . ' berhasil diubah']);
    }

    public function remove($id)
    {
        $content = WidgetImageSlider::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $content->delete();

        return redirect('/admin/widget-image-slider')->with(['success' => 'Widget Konten ' . $content->title . ' berhasil dihapus']);
    }
}
