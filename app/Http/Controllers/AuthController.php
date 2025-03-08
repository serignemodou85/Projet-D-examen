<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    // Redirection vers la page de connexion
    public function login()
    {
        return view('admin.login');
    }

    // Gestion des erreurs et redirection
    private function setErrorAndRedirect($message, $titre, $redirectUrl = "login")
    {
        session()->flash('error', $message);
        return redirect($redirectUrl . "?error=1&message=" .
               urlencode($message) . "&titre=" . urlencode($titre));
    }

    // Gestion du succès et redirection
    private function setSuccessAndRedirect($message, $titre, $redirectUrl = "admin")
    {
        session()->flash('success', $message);
        return redirect($redirectUrl . "?success=1&message=" .
               urlencode($message) . "&titre=" . urlencode($titre));
    }

    // Méthode pour authentifier un Superadmin et Admin
    public function handlogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Vérification si l'email est celui du SuperAdmin prédéfini
        if ($email === "admin@gmail.com" && Hash::check($password, bcrypt('Passer123'))) {
            $user = new Administrateur();
            $user->id = 3;
            $user->nom = "BEYE";
            $user->prenom = "Balla";
            $user->email = $email;
            $user->telephone = 770000000;
            $user->role = 'superadmin';

            // Connecte l'utilisateur en utilisant Auth::login
            Auth::login($user);

            return $this->setSuccessAndRedirect(
                "Bienvenue dans l'administration",
                "Connexion réussie",
                route('admin.index')
            );
        }
        // Recherche l'admin dans la base de données si ce n'est pas le SuperAdmin
        elseif ($admin = Administrateur::where('email', $email)->first()) {
            // Si l'admin existe, vérifier le mot de passe
            if (Hash::check($password, $admin->password)) {
                // Connecte l'utilisateur en utilisant Auth::login
                Auth::login($admin);

                // Si l'utilisateur est un admin, rediriger vers l'espace admin
                if ($admin->role == 'admin') {
                    return $this->setSuccessAndRedirect(
                        "Bienvenue dans votre espace Admin",
                        "Connexion réussie",
                        route('admin.index')
                    );
                } else {
                    // Si le rôle n'est pas admin, on peut mettre un message d'erreur
                    return $this->setErrorAndRedirect(
                        "Vous n'êtes pas autorisé à vous connecter.",
                        "Erreur de connexion",
                        "login"
                    );
                }
            } else {
                // Si le mot de passe est incorrect
                return $this->setErrorAndRedirect(
                    "Email ou mot de passe incorrect",
                    "Erreur de connexion",
                    "login"
                );
            }
        }
        // Si l'email n'existe pas dans la base de données
        else {
            return $this->setErrorAndRedirect(
                "Email ou mot de passe incorrect",
                "Erreur de connexion",
                "login"
            );
        }
    }


    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalidation de la session actuelle
        $request->session()->invalidate();

        // Régénération du token CSRF
        $request->session()->regenerateToken();

        // Redirection vers la page de login
        return $this->setErrorAndRedirect(
            "Vous avez ete deconnecter avec succeee",
            "Deconnexion Reussie",
            "login"
        );
    }







}
