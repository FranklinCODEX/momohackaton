<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TypeInsurance;
use App\Http\Controllers\Controller;
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
        $typeInsurances = TypeInsurance::all();

        return response()->json(["typeInsurance" => $typeInsurances]);
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
            'imagePath' => "required",
            'prix' => ["required", "integer"]
        ]);
        
        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        TypeInsurance::create($request->all());

        return response()->json(['message' => "Type d'assurance crée avec succès"], 201);
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
            'imagePath' => '',
            'prix' => ''
        ]);
        $typeInsurance->update($validatedData);
        
        return response()->json([
            'message'=>"Type d'assurance modifié succès",
            "typeInsurance" => $typeInsurance
        ]);
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
        return response()->json(['message'=>"Type d'assurance supprimé avec succès"]);
    }
}
