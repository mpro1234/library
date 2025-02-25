<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    // إنشاء فئة جديدة
    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    // عرض فئة معينة
    public function show(Category $category)
    {
        return $category;
    }

    // تحديث فئة معينة
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return $category;
    }

    // حذف فئة معينة
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}
