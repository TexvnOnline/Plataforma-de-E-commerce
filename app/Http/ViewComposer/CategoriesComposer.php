<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Category;
class CategoriesComposer
{
    public function compose(View $view)
    {
        $categorias = Category::with('subcategories','image')->get();
        $view->with('categorias',$categorias);
    }
}
