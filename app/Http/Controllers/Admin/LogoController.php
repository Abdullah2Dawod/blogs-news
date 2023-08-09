<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = logo::latest()->paginate(15);
        return view('admin.logos.home', [
            'logo' => $logo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, logo $logo)
    {
        $rules = [
            'name_logo' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];

        $date = $request->validate($rules);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/images', 'public');
            $date['image'] = $path;
        }

        logo::create($date);

        return redirect()->route('logos.index')->with('update', 'تم إضافة لوقو بنجاح . ')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $logo = logo::findOrFail($id);
        return view('admin.logos.edit', compact('logo'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $logo = logo::findOrFail($id);

        $rules = [
            'name_logo' => 'required',
        ];

        $date = $request->validate($rules);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/images', 'public');
            $date['image'] = $path;
        }

        $old_image = $logo->image;
        $logo->update($date);

        if ($old_image && $old_image != $logo->image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('logos.index')->with('update', 'تم تحديث البيانات بنجاح ')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $logo = logo::findOrFail($id);
        $logo->delete();

        return redirect()->route('logos.index')->with('update', 'تم حذف البيانات بنجاح ')->with('type', 'danger');
    }
}
