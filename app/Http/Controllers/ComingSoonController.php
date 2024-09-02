<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Traits\CSVUsers;
use Illuminate\Support\Facades\Log;

class ComingSoonController extends Controller
{
    use CSVUsers;

    public function submit(Request $request)
    {

        // Valider les données du formulaire
        $request->validate(
            [
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'email' => [
                    'required',
                    'email',
                    'unique:users,email',
                    'regex:/^[^@]+@[^@]+\.(fr|ch|com|swiss)$/'
                ],
            ],
            [
                'nom.required' => 'Entrez votre nom',
                'prenom.required' => 'Entrez votre prénom',
                'email.required' => 'Entrez une adresse email',
                'email.email' => 'Entrez une adresse email valide',
                'email.unique' => 'Cette adresse email existe déjà',
                'email.regex' => 'L\'adresse email doit se terminer par .fr, .ch, .swiss ou .com',
            ]
        );

        try {
            // Enregistrer le client dans la base de données
            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
            ]);

            $destinataire = $user->email;

            Mail::to($destinataire)->send(new WelcomeMail($user));

            // Appeler la méthode pour stocker les données du client dans un fichier CSV
            $this->storeClientData($user);

            // Rediriger ou retourner une réponse
            $success = [
                'destinataire' => 'Un email sera envoyé à l\'adresse suivante : ' . $destinataire,
            ];

            return redirect()->back()->with('success', $success);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Erreur lors de l\'inscription : ' . $e->getMessage());

            // Préparer le message d'erreur
            $error = [
                'emailError' => 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer plus tard.',
            ];

            return redirect()->back()->withErrors($error);
        }
    }
}
