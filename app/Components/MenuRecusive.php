<?php

namespace App\Components;

use App\Menu;
use Illuminate\Support\Facades\Log;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecusiveAdd($parentId = 0, $submark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataitem) {
            $this->html .= '<option value = "' . $dataitem->id . '">' . $submark . $dataitem->name . '</option>';
            $this->menuRecusiveAdd($dataitem->id, $submark . "--");
        }
        return $this->html;
    }
    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $submark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataitem) {
            if ($parentIdMenuEdit == $dataitem->id) {
                $this->html .= '<option selected value = "' . $dataitem->id . '">' . $submark . $dataitem->name . '</option>';
            } else {
                $this->html .= '<option value = "' . $dataitem->id . '">' . $submark . $dataitem->name . '</option>';
            }
            $this->menuRecusiveEdit($parentIdMenuEdit, $dataitem->id, $submark . "--");
        }
        return $this->html;
    }
}
