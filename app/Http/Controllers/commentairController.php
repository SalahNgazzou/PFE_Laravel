<?php

namespace App\Http\Controllers;

use App\Models\Commentaires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commentairController extends Controller
{
    function getCommentairEnAttente() {
        return Commentaires::where('etat', 'en attente')->get();
    }
    function CommentaireById($id) {
        return Commentaires::where('id_user', $id)
        ->where('etat', 'en attente')
        ->get();
    }
    public function get_commentaire_bien($id)
    {
        // Récupérer le commentaire avec le bien associé
        $comment = DB::table('commentairs')
            ->join('biens', 'commentairs.id_bien', '=', 'biens.id')
            ->select('commentairs.*', 'biens.*')
            ->where('commentairs.id', $id)
            ->first();
    
        if (!$comment) {
            return response()->json(['message' => 'Commentaire non trouvé'], 404);
        }
    
        // Récupérer les images associées au bien
        $images = DB::table('list_images')
            ->where('id_bien', $comment->id_bien)
            ->get();
    
        // Ajouter les images au commentaire
        $comment->images = $images;
    
        return response()->json($comment);
    }

    function deleteCommentById($id) {
        $comment = Commentaires::find($id);
    
        if ($comment) {
            $comment->delete();
            return true; // Si la suppression est réussie
        }
    
        return false; // Si l'estimation avec l'ID donné n'est pas trouvée
    }
    public function updateCommentaireStatusToTerminated($id) {
        $comment = Commentaires::find($id);
    
        if ($comment) {
            $comment->etat = 'terminé';
            $comment->save();
            return response()->json(['success' => true], 200);
        }
    
        return response()->json(['error' => 'Commentaire non trouvé'], 404);
    }
    
    
}
