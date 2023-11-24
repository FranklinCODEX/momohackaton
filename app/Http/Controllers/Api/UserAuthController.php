<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données envoyées dans la requête
        $validator =  Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phoneNumber' => ['required'],
            'profileImagePath' => ['required'],
            'livingAddress' => ['required'],
            'profession' => ['required'],
            'statusMatrimonial' => ['required'],
            'birthday' => ['required'],
            'nationalCardID' => ['required'],
            'revenuAnnuel' => ['required'],
        ]);
        
        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Créer un nouvel utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'profileImagePath' => $request->profileImagePath,
            'livingAddress' => $request->livingAddress,
            'profession' => $request->profession,
            'statusMatrimonial' => $request->statusMatrimonial,
            'birthday' => $request->birthday,
            'nationalCardID' => $request->nationalCardID,
            'revenuAnnuel' => $request->revenuAnnuel,
        ]);

        // Retourner la réponse avec le jeton d'authentification
        return response()->json(['message' => "Compte creer avec succes"], 201,);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user= User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password) ) {
            return response()->json([
                'message' => 'Informations invalides',
            ], 401);
        }

        $token = $user->createToken('connexion-user')->plainTextToken;
        return response()->json([
            'message' => 'Connexion effectuer avec succes',
            'token' => $token,
            'user' => $user,
        ]);

    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Utilisateur déconnecté avec succes']);
    }
}
