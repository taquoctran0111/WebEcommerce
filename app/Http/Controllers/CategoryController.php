<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return View('admin.productcategory.add');
    }
    public function index(){
        return View('admin.productcategory.index');
    }
}
