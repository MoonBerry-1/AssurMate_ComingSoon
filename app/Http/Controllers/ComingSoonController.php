<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Http\RedirectResponse;

class ComingSoonController extends Controller
{
    public function submit(Request $request)
    {

        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[^@]+@[^@]+\.(fr|ch|com)$/'
            ],
        ],
        [
            'nom.required' => 'Entrez votre nom',
            'prenom.required' => 'Entrez votre prénom',
            'email.required' => 'Entrez une adresse email',
            'email.email' => 'Entrez une adresse email valide',
            'email.unique' => 'Cette adresse email existe déjà',
            'email.regex' => 'L\'adresse email doit se terminer par .fr, .ch ou .com',
        ]);

        // Enregistrer le client dans la base de données
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ]);

        $destinataire = $user->email;

        $corpsMail = 'Saluuut  !'.  $user->prenom;

        $bccDestinataires = ['game.doud@gmail.com', 'david.olv.gm@gmail.com'];

Mail::to($destinataire)
    ->bcc($bccDestinataires)
    ->send(new WelcomeMail($user->prenom, $user->nom, $corpsMail));

        // Rediriger ou retourner une réponse
        return redirect()->back()->with('success', 'Vous recevrez bientôt un email');
    }
}
