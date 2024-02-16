<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function indexPage()
    {
        return view('admin.pages.content.index');
    }

    public function list(Request $request)
    {
        $list = Content::query();
        return datatables()->eloquent($list)->toJson();
    }

    public function addPage()
    {
        return view('admin.pages.content.add');
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $content = new Content();
        $content->title = $request->judul;
        $content->slug = Str::slug($request->judul, '-');
        $content->content = $request->konten;
        $content->status = $request->status;
        $content->user_id =Auth::user()->id;
        $content->save();

        return redirect('/admin/content')->with(['success' => 'Konten ' . $request->judul . ' berhasil ditambahkan']);
    }

    public function editPage($id)
    {
        $content = Content::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $data['content'] = $content;
        return view('admin.pages.content.update', $data);
    }

    public function edit(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'judul' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $content = Content::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $content->title = $request->judul;
        // $content->slug = Str::slug($request->judul, '-');
        $content->content = $request->konten;
        $content->status = $request->status;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = $content->slug . '-' . $cover->hashName();
            Storage::disk('media')->putFileAs('cover', $cover, $filename);
            $content->cover = $filename;
        }
        $content->save();

        return redirect('/admin/content')->with(['success' => 'Konten ' . $request->judul . ' berhasil diubah']);
    }

    public function remove($id)
    {
        $content = Content::find($id);
        if (!$content) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $content->delete();

        return redirect('/admin/content')->with(['success' => 'Konten ' . $content->title . ' berhasil dihapus']);
    }
}
