<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }
    public function create()
    {
        $data = $this->productCategory->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return View('admin.productcategory.add', compact('htmlOption'));
    }
    
    public function index()
    {
        $categoryList = $this->productCategory->paginate(10);
        return View('admin.productcategory.index', compact('categoryList'));
    }
    public function store(Request $request)
    {
        $this->productCategory->create([
            'name' => $request->categoryName,
            'parent_id' => $request->parentId,
            'slug' => str_slug($request->categoryName)
        ]);
        return redirect()->route('categories.index');
    }
}
