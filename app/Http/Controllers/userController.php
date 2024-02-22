<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;




class userController extends Controller
{
    function ajouter(request $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->role = $request->input("role");
        $user->password = Hash::make($request->input("password"));
        $user->addresse = $request->input("addresse");
        $user->num_phone = $request->input("num_phone");
        if ($request->file('image') != null) {
            $user->image = $request->file("image")->store("img");
        }

        $user->nom_agence = $request->input("nom_agence");
        $user->save();
        return $user;
    }
    function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

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
    function liste()
    {
        return User::all();
    }
    // ProductController.php

    public function destroy($id)
    {
        // Find the product by ID
        $user = User::find($id);

        // Check if the product exists
        if (!$user) {
            return response()->json(['error' => 'utilisateur non disponible'], 404);
        }

        // Delete the product
        $user->delete();

        // Respond with a success message or other data
        return response()->json(['message' => 'utilisateur supprimer avec success']);
    }


    public function update(Request $request, $id)
    {

    

        // Trouver l'utilisateur que vous souhaitez mettre à jour
        $user = User::findOrFail($id);

        // Mettre à jour les champs avec les nouvelles valeurs
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->addresse = $request->input('addresse');
        $user->num_phone = $request->input('num_phone');
        /* $user->nom_agence = $request->input('nom_agence'); */

        // Mettre à jour le mot de passe si un nouveau mot de passe est fourni
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Mettre à jour l'image si une nouvelle image est fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            // Storage::delete($user->image);

            // Enregistrer la nouvelle image
            $user->image = $request->file('image')->store('img');
        }

        // Enregistrer les modifications dans la base de données
        $user->save();

        // Retourner l'utilisateur mis à jour
        return $user;
    }

    // ...
}
