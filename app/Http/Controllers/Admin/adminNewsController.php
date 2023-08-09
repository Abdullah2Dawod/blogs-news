<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new = news::latest()->paginate(15);
        return view('admin.news.home', [
            'new' => $new,
        ]);

        // $companies = Company::orderBy('id','desc')->paginate(5);
        // return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'news_source' => 'required',
        ];

        $date = $request->validate($rules);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/images', 'public');
            $date['image'] = $path;
        }

        news::create($date);

        return redirect()->route('admin.index')->with('update', 'تم إضافة خبر جديد بنجاح ')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $new = news::firstOrFail();

        return view('homeng.show' , [
            'new' => $new,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $new = news::findOrFail($id);
        return view('admin.news.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {

        $new = news::findOrFail($id);

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'news_source' => 'required',
        ];

        $date = $request->validate($rules);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/images', 'public');
            $date['image'] = $path;
        }

        $old_image = $new->image;
        $new->update($date);

        if ($old_image && $old_image != $new->image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.index')->with('update', 'تم تحديث البيانات بنجاح ')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $new = news::findOrFail($id);

        $new->delete();
        if ($new->image) {
            Storage::disk('public')->delete($new->image);
        }
        return redirect()->route('admin.index')->with('update', 'تم حذف اللوقو بنجاح ')->with('type', 'danger');
    }
}
