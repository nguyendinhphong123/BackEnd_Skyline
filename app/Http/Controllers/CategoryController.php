<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $items = $this->categoryService->all($request);
        return view('categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);
        $data = $request->except(['_token','_method']);
        $this->categoryService->store($data);
        toast('thêm Thành Công!', 'success', 'top-right');
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
        $this->authorize('update', Category::class);
        $item = $this->categoryService->find($id);
        return view('categories.edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,$id)
    {
        $this->authorize('update', Category::class);
        $data = $request->except(['_token','_method']);
        $this->categoryService->update($id,$data);
        toast('sửa Thành Công!', 'success', 'top-right');
            return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Category::class);
        $this->categoryService->destroy($id);
        toast('Xóa Thành Công!', 'success', 'top-right');
        return redirect()->route('categories.index');
    }
    public function getTrashed()
    {
        $items = $this->categoryService->getTrashed();
        return view('categories.trash', compact('items'));
    }
    public function restore($id)
    {
        // $this->authorize('restore', Category::class);
        try {
            $items = $this->categoryService->restore($id);
            toast('Khôi phục Thành Công!', 'success', 'top-right');
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.index');
        }
    }
    public function deleteforever($id)
    {

        $this->authorize('forceDelete', Category::class);
        try {
            $items = $this->categoryService->deleteforever($id);
            toast('Xóa Vĩnh Viễn Thành Công!', 'success', 'top-right');
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.index');
        }
}
}
