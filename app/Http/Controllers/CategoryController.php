<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\Interfaces\CategoryServiceInterface;
class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(Request $request)
    {

        $items = $this->categoryService->all($request);
        return view('categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $data = $request->except(['_token','_method']);
        $this->categoryService->store($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->categoryService->find($id);
        return view('categories.edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,$id)
    {
        $data = $request->except(['_token','_method']);
        $this->categoryService->update($id,$data);
            return redirect()->route('categories.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);
        return redirect()->route('categories.index');
    }
}
