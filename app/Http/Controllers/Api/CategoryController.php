<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

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
        return CategoryResource::collection( $items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store($request);
        response()->json()([
            'success'=>true,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = $this->categoryService->find($id);
        return new CategoryResource( $items);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->categoryService->update($request, $id);
        response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryService->destroy($id);
        response()->json([
            'success' => true,
        ]);
    }
}
