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
                'prenom.required' => 'Entrez votre prenom',
                'email.required' => 'Entrez une adresse email',
                'email.email' => 'Entrez une adresse email valide',
                'email.unique' => 'Cette adresse email existe déjà',
                'email.regex' => 'L\'adresse email doit se terminer par .fr, .ch ou .com',
            ]
        );

        //$bccDestinataires = ['omar.zghdd@gmail.com', 'fbr.mickael@gmail.com'];
        
            // Enregistrer le client dans la base de données
            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
            ]);

            $destinataire = $user->email;

            $corpsMail = 'Saluuut  !' .  $user->prenom;
            Mail::to($destinataire)
                ->queue(new WelcomeMail($user, $corpsMail));
            //->bcc($bccDestinataires)

            // Appeler la méthode pour stocker les données du client dans un fichier CSV
            $filePath = $this->storeClientData($user);

            // Envoyer le fichier CSV au propriétaire de l'application
            Mail::raw('Voici la liste des clients inscrits.', function ($message) use ($filePath) {
                $message->to('david.oliveira.gm@gmail.com')
                    ->subject('Liste des clients inscrits')
                    ->attach($filePath);
                //->bcc($bccDestinataires)
            });
            Log::info('Email de bienvenue envoyé et utilisateur enregistré dans le fichier CSV : ', ['email' => $destinataire]);
            // Rediriger ou retourner une réponse
            $success = [
                'envoiReussi' => 'Vous recevrez bientôt un email',
                'destinataire' => 'Un email sera envoyé à l\'adresse suivante : ' . $destinataire,
            ];
            return redirect()->back()->with('success', $success);

        }

 
}
