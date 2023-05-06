<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }
    public function paginate($data){
        $result = $this->model->paginate();
        return $result;
    }

    public function all($request)
    {
        $categories = $this->model->select('*');

        if (!empty($request->key)) {
            $search = $request->key;
            $categories = $categories->Search($search);
        }
        return $categories->orderBy('id','DESC')->paginate(5);
    }
}
