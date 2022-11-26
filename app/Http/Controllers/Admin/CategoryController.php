<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {

        return view('admin.category.index');
    }

    public function create() {

        return view('admin.category.create');
    }

    public function store(StoreRequest $request) {

        //return $request;
        $category = new Category($request->except(['image', 'status']));

        $category->status = $request->status ? '1' : '0';

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('uploads/category/', $filename);

            $category->image = $filename;
        }

        $category->save();

        return redirect('admin/category')->with('message', Config::get('constants.CATEGORY.add'));
    }

    public function edit(Category $category) {

        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category) {

        $category->update($request->except(['image', 'status']));

        $category->status = $request->status ? '1' : '0';
        $category->save();

        if($request->hasFile('image')) {

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)) File::delete($path);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('uploads/category/', $filename);

            $category->image = $filename;
        }

        return redirect('admin/category')->with('message', Config::get('constants.CATEGORY.update'));
    }
}
