<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    protected $perPage = 12;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $categorySlug = null)
    {
        $categoryName = '';
        if ($categorySlug) {
            $category = Category::whereSlug($categorySlug)->first();
            $categorySlug = $category->slug;
            $categoryName = $category->title;
            $projects = $category->projects()
                ->with('categories')
                ->orderBy('updated_at', 'desc')
                ->paginate($this->perPage)
                ->toArray();
        } else {
            $projects = Project::with('categories')
                ->orderBy('updated_at', 'desc')
                ->paginate($this->perPage)
                ->toArray();
        }

        $categories = Category::all()->toArray();

        if ($request->ajax()) {

            $view = view('projects.data')->with([
                'results' => $projects,
                'title' => $categoryName,
                'slug' => $categorySlug,
                'categories' => $categories
            ])->render();

            return response()->json(['html' => $view]);
        }

        return view('projects.index')->with([
            'results' => $projects,
            'title' => $categoryName,
            'slug' => $categorySlug,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toArray();

        return view('projects.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $inputs = $this->prepareInputs($request);

        $project = Project::create($inputs);
        $project->categories()->attach($request->input('category'));

        return redirect('projects')->with('success', 'Project Created Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit($projectId)
    {
        $categories = Category::all()->toArray();
        $project = Project::find($projectId);
        $project->category_ids = $project->categories()->pluck('categories.id')->toArray();

        return view('projects.edit')->with('categories', $categories)->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $projectId)
    {
        $inputs = $this->prepareInputs($request);

        Project::where('id', $projectId)->update($inputs);
        $project = Project::find($projectId);
        $project->categories()->sync($request->input('category', []));

        return redirect('projects')->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function delete($projectId)
    {
        $project = Project::find($projectId)->delete();

        return redirect('projects')->with('success', 'Project Deleted Successfully');
    }

    /**
     * Image upload
     *
     * @param $request
     * @return void
     */
    protected function uploadImage($request)
    {
        if($request->file('image_path')){
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $path = url('images/'.$imageName);
            return $path;
        }
    }

    /**
     * Prepare inputs for database
     *
     * @param $request
     * @return mixed
     */
    protected function prepareInputs($request)
    {
        $inputs = $request->except(['_token', 'category']);

        $inputs['slug'] = Str::slug($inputs['title']);
        $inputs['start_date'] = Carbon::parse($request->input('start_date'));
        $inputs['end_date'] = Carbon::parse($request->input('end_date'));
        $inputs['status'] = $request->input('status') == "on" ? 1 : 0;

        // Image upload
        $path = $this->uploadImage($request);
        $inputs['image_path'] = $path;

        return $inputs;
    }
}
