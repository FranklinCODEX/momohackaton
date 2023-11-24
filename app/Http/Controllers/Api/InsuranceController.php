<?php

namespace App\Http\Controllers\Api;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeInsurence;
use Bmatovu\MtnMomo\Products\Collection;
use Illuminate\Support\Facades\Validator;

class InsuranceController extends Controller
{
    public function createInsurance(Request $request)
    {
        // Valider les données envoyées dans la requête
        //314fb0289b52401f87d936aee8dfae5e
        $validator = Validator::make($request->all(), [
            'insurance_type_id' => ['required', 'integer'],
            'date_limite' => ['required'],
            'insuranceFrequency' => ['required', 'string'],
            'insuranceDuration' => ['required', 'string'],
            'renouvellement' => ['required', 'string'],
            'dateRenouvellement' => ['required'],
            'dateDebutContrat' => ['required'],
            'fullName' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'phoneNumber' => ['required', 'string'],
            'birthday' => ['required'],
            'profession' => ['required', 'string'],
            'statutionMatrimoniale' => ['required', 'string'],
            'cardID' => ['required', 'string'],
            'revenuAnnuel' => ['required', 'string'],
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
        // $tpyeInsurance = TypeInsurence::where('id', '=', $validator['insurance_type_id']);

        // $collection  = new Collection();
        // $resultat = $collection->requestToPay(1755964, $validator['phoneNumber'], $tpyeInsurance->prix);
        // $status = $collection->getTransactionStatus($resultat)['status'];

        // if($status == 'SUCCESSFUL')
        // {
        //      Créer un nouvel objet Insurance
        //     $insurance = Insurance::create($request->all());
        // }
        
        //;NLT!+PB;0fj
        // Retourner la réponse avec le nouvel objet Insurance créé
        $insurance = Insurance::create($request->all());
        return response()->json(['message' => 'Assurance crée avec succès'], 201);
    }

    public function allTypeInsurance()
    {
        $TypeInsurences = TypeInsurence::all();
        return response()->json(['typeInsurences' => $TypeInsurences ], 201);
    }
    public function testpay()
    {
        $collection  = new Collection();
        $resultat = $collection->requestToPay(1755964, 22995149987, 100);
        $status = $collection->getTransactionStatus($resultat)['status'];


        return response()->json([$resultat, $status ], 201);
    }
}
