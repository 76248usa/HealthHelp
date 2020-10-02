<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Physician;
use App\Category;
use App\Subcategory;


class FrontProductListController extends Controller
{
    public function index()
    {
        $physicians = Physician::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();


        return view('physician', compact('physicians'));
    }

    public function show($id)
    {
        $physician = Physician::findOrFail($id);
        $productFromSameCategories = Physician::inRandomOrder()->where('category_id', $physician->category_id)->where('id', '!=', $physician->id)->limit(3)
            ->get();

        return view('show', compact('physician', 'productFromSameCategories'));
    }

    public function moreProducts(Request $request)
    {
        if ($request->search) {
            $physicians = Physician::where('name', 'like', '%' . $request->search . '%')->get();
            return view('all-product', compact('physicians'));
        }
        $physicians = Physician::all();

        return view('all-product', compact('physicians'));
    }
}
