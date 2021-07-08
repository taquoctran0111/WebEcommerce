<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    // public function getMenu($parentId)
    // {
    //     $data = $this->menu->all();
    //     $recusive = new MenuRecusive($data);
    //     $selectOption = $recusive->menuRecusiveAdd($parentId);
    //     return $selectOption;
    // }
    public function index()
    {
        $menuList = $this->menu->paginate(5);
        return View('admin.menucategory.index', compact('menuList'));
    }
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return View('admin.menucategory.add', compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->menuName,
            'parent_id' => $request->parentId,
            'slug' =>  str_slug($request->menuName)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id, Request $request)
    {
        $menu = $this->menu->find($id);
        $selectOption = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return View('admin.menucategory.edit', compact('menu', 'selectOption'));
    }
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->menuName,
            'parent_id' => $request->parentId,
            'slug' => str_slug($request->menuName)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        $menu = $this->menu->all();
        $menu->first()->where('parent_id', $id)->delete();
        $menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
