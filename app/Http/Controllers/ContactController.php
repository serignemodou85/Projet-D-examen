<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Gestion des erreurs et redirection
    private function setErrorAndRedirect($message, $titre, $redirectUrl = "index")
    {
        session()->flash('error', $message);
        return redirect($redirectUrl . "?error=1&message=" . urlencode($message) . "&titre=" . urlencode($titre));
    }

    // Gestion du succès et redirection
    private function setSuccessAndRedirect($message, $titre, $redirectUrl = "index")
    {
        session()->flash('success', $message);
        return redirect($redirectUrl . "?success=1&message=" . urlencode($message) . "&titre=" . urlencode($titre));
    }

    // Méthode pour ajouter un contact
    public function addContact(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',  // Validation correcte pour l'email
            'message' => 'required|string',  // Validation correcte pour le message
        ]);

        // Création du contact
        $contact = Contact::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,  // Correction de "mesage" à "message"
        ]);

        // Redirection après succès
        return $this->setSuccessAndRedirect(
            "Votre message a été envoyé avec succès",
            "Envoi Réussi",
            route('vitrine.contact')  // Redirection vers la page de contact
        );
    }
}
