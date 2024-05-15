<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class userController extends Controller
{
    function ajouter(request $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->cin = $request->input("cin");
        $user->birth = $request->input("birth");
        $user->email = $request->input("email");
        $user->role = $request->input("role");

        // Générer un mot de passe aléatoire
        $randomPassword = Str::random(10); // 10 caractères aléatoires
        $user->password = Hash::make($randomPassword);

        $user->addresse = $request->input("addresse");
        $user->num_phone = $request->input("num_phone");
        $user->statue = $request->input("statue");
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::random(32) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $filename);
            $user->image = $filename;
          }

            $user->save();
            $message = "Adresse email: {$user->email}\nMot de passe: {$randomPassword}";
            $to = $user->email;
            $subject = "votre compte a été créé avec succés ";
            Mail::raw($message, function ($mail) use ($to, $subject) {
                $mail->to($to)->subject($subject);
            });


            return $user;
        
    }
        function login(Request $request)
        {

            $user = User::where("email", $request->email)->first();
            // Check if the user exists and if the password matches
            if (!$user || !Hash::check($request->password, $user->password) || $request->statue === "Désactiver") {
                // If the user doesn't exist or the password doesn't match, return an error message
                return ["error" => "password or email is not matched"];
            }



            // If the user exists and the password matches, generate an access token
            $token = $user->createToken('Token name', [$user->role]);
            // Return the user object along with the access token
            return [
                'user' => $user,
                'access_token' => $token->accessToken,
            ];

        }
        function liste()
        {
            $user = User::all();
            return $user;
        }


        // ProductController.php

        function destroy($id)
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


        function getUser($id)
        {
            // Trouver l'utilisateur que vous souhaitez mettre à jour
            $user = User::find($id);
            // Retourner l'utilisateur mis à jour
            return $user;
        }

        function update(Request $request, $id)
        {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
            }
            $user->name = $request->input("name");
            $user->last_name = $request->input("last_name");
            $user->cin = $request->input("cin");
            $user->birth = $request->input("birth");
            $user->email = $request->input("email");
            $user->role = $request->input("role");
            $user->password = Hash::make($request->input("password"));
            $user->addresse = $request->input("addresse");
            $user->num_phone = $request->input("num_phone");
            $destination = 'img/profiles';
            if ($request->hasFile('image')) {
                if ($user->image::exists($destination)) {
                    $user->image::delete($destination);
                }
                // Récupérer le fichier image
                $file = $request->file('image');
                // Définir un nom unique pour l'image
                $extension = $file->getClientOriginalExtension();
                // Déplacer l'image vers le dossier de stockage
                $filename = time() . "." . $extension;
                // Mettre à jour le chemin de l'image dans la base de données
                $file->move('img/profiles', $filename);
                $user->image = $filename;
            }

            $user->update();
            return $user;
        }

        function ChangeStatus($id)
        {
            $user = User::findOrFail($id);

            // Inversion du statut du compte
            $user->statue = $user->statue === 'Activer' ? 'Déactiver' : 'Activer';
            $user->save();

            return response()->json(['message' => 'Statut du compte mis à jour avec succès'], 200);
        }





    
}