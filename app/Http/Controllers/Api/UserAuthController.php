<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données envoyées dans la requête
        $validator =  Validator::make($request->all(), [
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
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

            'fullName' => $request->nom,
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
        return response()->json(['message' => "Compte creer avec succes"], 201);
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

        $type = "admin" ? $user->email == "admin2023@gmail.com": $type="user";

        $token = $user->createToken('connexionUtilisateur')->plainTextToken;
        return response()->json([
            'message' => 'Connexion effectuer avec succes',
            'token' => $token,
            'user' => $user,
            'admin' => $type
        ]);

    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Utilisateur déconnecté avec succes']);
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $validatedData = $request->validate([
            'nom' => "",
            'email' => "",
            'password' => "",
            'phoneNumber' => "",
            'profileImagePath' => "",
            'livingAddress' => "",
            'profession' => "",
            'statusMatrimonial' => "",
            'birthday' => "",
            'nationalCardID' => "",
            'revenuAnnuel' => "",
        ]);
        $user->password = Hash::make($request->password);
        $user->update($validatedData);

        return response()->json([
            "message" => "Information modifier avec succès",
            'user' => $user
        ]);
    }
}
