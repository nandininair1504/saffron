<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $perPage = 12;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::with('projects')
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage)
            ->toArray();

        if ($request->ajax()) {

            $view = view('categories.data')->with('results', $categories)->render();

            return response()->json(['html' => $view]);
        }

        return view('categories.index')->with('results', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $title = $request->input('title');

        Category::create([
            'title' => $title,
            'slug'  => Str::slug($title),
        ]);

        return redirect('categories')->with('success', 'Category Created Successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $categoryId)
    {
        $title = $request->input('title');

        Category::find($categoryId)->update([
            'title' => $title,
            'slug'  => Str::slug($title),
        ]);

        return redirect('categories')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function delete($categoryId)
    {
        $category = Category::find($categoryId);

        if($category->projects->count() > 0){
            return redirect('categories')->with('error', 'Cannot delete this category since there are projects under it');
        }

        $category->delete();

        return redirect('categories')->with('success', 'Category Deleted Successfully');
    }
}
