<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSVController extends Controller
{
    public function storeClientData($user)
    {
        // Chemins des fichiers
        $csvFilePath = storage_path('app/files/clients_inscrits.csv');

        // Remplissage du fichier CSV
        $this->appendToCsv($csvFilePath, $user);

        // Retourner le chemin du fichier Excel pour l'envoyer par email
        return $csvFilePath;
    }

    private function appendToCsv($filePath, $user)
    {
        // Si le fichier n'existe pas, ajouter un en-tête
        if (!file_exists($filePath)) {
            $header = ['Prenom', 'Nom', 'Email', 'Date d\'inscription'];
            file_put_contents($filePath, implode(',', $header) . "\n");
        }

        // Les données à écrire
        $data = [
            $user->prenom,
            $user->nom,
            $user->email,
            now()->toDateTimeString(),  // Date d'inscription
        ];

        // Convertir les données en ligne CSV
        $csvLine = implode(',', $data) . "\n";

        // Ajouter la ligne au fichier CSV
        file_put_contents($filePath, $csvLine, FILE_APPEND);
    }

}
