<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Physician;

class PhysicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $physicians = Physician::paginate(20);
        //$physicians = Physician::all();
        return view('admin.physician.index', compact('physicians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $subcategories = Subcategory::pluck('name', 'id')->all();

        return view('admin.physician.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        //Physician::create($request->all());
        //return redirect('admin.physician.create');

        Physician::create([
            'name' => $request->name,
            'price' => $request->price,
            'specialization' => $request->specialization,
            'credentials' => $request->credentials,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory

        ]);
        notify()->success('Physician successfully created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $physician = Physician::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $subcategories = Subcategory::pluck('name', 'id')->all();

        return view('admin.physician.edit', compact('physician', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $physician = Physician::findOrFail($id);

        $physician->name = $request->name;
        $physician->credentials = $request->credentials;
        $physician->specialization = $request->specialization;
        $physician->category_id = $request->category;
        $physician->subcategory_id = $request->subcategory;
        $physician->price = $request->price;

        $physician->save();

        notify()->success('Physician updated successfully');
        return redirect()->route('physician.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $physician = Physician::findOrFail($id);
        $physician->delete();

        notify()->success('Physician successfully deleted');
        return redirect()->route('physician.index');
    }

    public function loadSubCategories(Request $request, $id)
    {
        $subcategory = Subcategory::where('category_id', $id)->pluck('name', 'id');
        return response()->json($subcategory);
    }
}
