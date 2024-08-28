<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($user) {
        $destinataire = $user->email; // Change to the recipient's email address
        $data = [
            'prenom' => $user->prenom,
            'nom' => $user->nom,
            'welcomeMessage' => 'Bienvenue sur AssurMAte !',
         ]; // Data to pass to the email view

         Mail::to($recipient)->send(new WelcomeMail($data['nom'], $data['prenom'], $data['welcomeMessage']));

         return response()->json(['message' => 'Email sent successfully to ' . $recipient]);
    }
}
