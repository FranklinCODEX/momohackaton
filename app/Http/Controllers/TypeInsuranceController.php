<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeInsurance;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TypeInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = TypeInsurance::all();

        return view('TypeInsurance.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TypeInsurance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données envoyées dans la requête
        $validator =  Validator::make($request->all(), [
            'name' => ["required"],
            'description' => ["required"],
            'imagePath' => "required|mimes:png,jpg,jpeg",
            'prix' => ["required", "integer"]
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $imagePath = $request->file('imagePath')->store('type_insurance_images', 'public');

        // TypeInsurance::create($request->all());

        TypeInsurance::create([
            'name' => $request->name,
            'description' => $request->description,
            'imagePath' => $imagePath,
            'prix' => $request->prix,
        ]);

        return Redirect::route('typeInsurance.index')->with('success', "Type d'assurance creer avec succès");
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
        //
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
        $typeInsurance = TypeInsurance::findOrFail($id);

        $validatedData = $request->validate([
            'name' => '',
            'description' => '',
            'prix' => ''
        ]);
            // Check if a new image is provided
        if ($request->hasFile('imagePath')) {
            // Store the new image and update the image path in the database
            $newImagePath = $request->file('imagePath')->store('type_insurance_images', 'public');
            $typeInsurance->update(['imagePath' => $newImagePath]);

            // Delete the old image file if it exists
            if ($typeInsurance->getOriginal('imagePath')) {
                Storage::delete('public/' . $typeInsurance->getOriginal('imagePath'));
            }
        }
        return Redirect::route('typeInsurance.index')->with('success', "Type d'assurance modifier avec succès");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeInsurance::whereId($id)->delete();
        return Redirect::route('typeInsurance.index')->with('success', "Type d'assurance supprimer avec succès");
    }
}