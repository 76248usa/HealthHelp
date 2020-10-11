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

    public function getSubcategoriesId(Request $request)
    {

        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach ($subcategory as $sub) {
            array_push($subId, $sub->id);
        }

        return $subId;
    }


    public function allProduct($name, Request $request)
    {
        $category = Category::where('id', $name)->first();
        $categoryId = $category->id;
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;


        if ($request->subcategory) {
            $physicians = $this->filterPhysicians($request);
            $filterSubCategories = $this->getSubcategoriesId($request);
            return view('category', compact('physicians', 'subcategories', 'slug', 'filterSubCategories', 'categoryId'));
        } elseif ($request->min || $request->max) {
            $physicians = $this->filterByPrice($request);
            return view('category', compact('physicians', 'subcategories', 'slug', 'categoryId'));
        } else {
            $physicians = Physician::where('category_id', $category->id)->get();

            return view('category', compact('physicians', 'subcategories', 'slug', 'categoryId'));
        }

        //return view('category', compact(
        // 'physicians',
        // 'subcategories',
        // 'slug',
        // 'categoryId',
        // 'price',
        //  'filterSubCategories'
        // ));
    }


    /* public function allProduct($name, Request $request)
    {

        $category  = Category::where('slug', $name)->first();
        $categoryId = $category->id;

        if ($request->subcategory) {
            $products = $this->filterProducts($request);
            $filterSubCategories = $this->getSubcategoriesId($request);
        } elseif ($request->min || $request->max) {
            $products = $this->filterByPrice($request);
        } else {
            $products = Physician::where('category_id', $category->id)->get();
        }
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;

        return view('category', compact('products', 'subcategories', 'slug', 'filterSubCategories', 'price', 'categoryId'));
    }*/

    public function filterPhysicians(Request $request)
    {

        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach ($subcategory as $sub) {
            array_push($subId, $sub->id);
        }
        $physicians = Physician::whereIn('subcategory_id', $subId)->get();
        return $physicians;
    }


    public function filterByPrice(Request $request)
    {
        $categoryId = $request->categoryId;
        $physician = Physician::whereBetween('price', [$request->min, $request->max])->where('category_id', $categoryId)->get();
        return $physician;
    }
}
