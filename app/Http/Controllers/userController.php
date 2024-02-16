<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Models\utilisateur;
use Illuminate\Http\Request;




class userController extends Controller
{
    function ajouter(request $request)
    {
        $user = new utilisateur();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->role = $request->input("role");
        $user->password = Hash::make($request->input("password"));
        $user->adresse = $request->input("adresse");
        $user->num_phone = $request->input("num_phone");
        $user->image = $request->file("image")->store("img");
        $user->nom_agence = $request->input("nom_agence");
        $user->save();
        return $user;
    }
    function login(Request $request)
    {
        $user = utilisateur::where("email", $request->email)->first();

        // Check if the user exists and if the password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            // If the user doesn't exist or the password doesn't match, return an error message
            return ["error" => "password or email is not matched"];
        }
    
        // If the user exists and the password matches, generate an access token
        $token = $user->createToken('MyAppToken');
    
        // Return the user object along with the access token
        return [
            'user' => $user,
            'access_token' => $token->accessToken,
        ];
    
    }
}