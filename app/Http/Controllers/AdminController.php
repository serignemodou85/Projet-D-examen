<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\Objet; // Import du modèle Objet
use App\Models\Utilisateur; // Import du modèle Objet
use App\Models\Categorie; // Import du modèle Objet
use App\Models\SousCategorie; // Import du modèle Objet
use Illuminate\Support\Facades\Auth;
use App\Models\Administrateur;  // Assurez-vous que cette ligne est présente
use Illuminate\Support\Facades\Log;
use App\Models\Contact;


class AdminController extends Controller
{
    //Methode pour recuperer les infos de l'utilisateur connecter
    public function __construct()
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté
        if ($user) {
            view()->share('userInfo', [
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'statut' => $user->statut,
            ]);
        } else {
            view()->share('userInfo', null);
        }
    }

    //Methode pour fficher la page acceuil admin avec les statistiques
    public function admin()
    {
        // Récupération des statistiques
        $totalUsers = Utilisateur::count();
        $totalAnnonces = Objet::count();
        $totalObjetsPerdus = Objet::where('statut', 'perdu')->count();
        $totalObjetsRetrouves = Objet::where('statut', 'retrouve')->count();
        $userInfo = Auth::user();
        return view('admin.index', compact('totalUsers', 'totalAnnonces', 'totalObjetsPerdus', 'totalObjetsRetrouves','userInfo'));
    }

    //Methode pour afficher liste users
    public function listeutilisateur()
    {
        $utilisateurs = Utilisateur::paginate(5);
        return view('admin.page.listeutilisateur', compact('utilisateurs'));
    }

    // Méthode pour afficher la corbeille
    public function corbeille()
    {
        // Récupérer les utilisateurs supprimés (soft deleted)
        $utilisateurs = Utilisateur::onlyTrashed()->get();

        // Retourner la vue avec les utilisateurs
        return view('admin.page.corbeille', compact('utilisateurs'));
    }

    // Méthode pour restaurer un utilisateur
    public function restore($id)
    {
        $utilisateur = Utilisateur::onlyTrashed()->findOrFail($id);
        $utilisateur->restore();
        return redirect()->route('admin.page.liteutilisateur')->with('alert_type', 'success_alert1');
    }

    // Méthode pour supprimer définitivement un utilisateur
    public function forceDelete($id)
    {
        $utilisateur = Utilisateur::onlyTrashed()->findOrFail($id);
        $utilisateur->forceDelete();
        return redirect()->route('admin.page.listeadmin')->with('alert_type', 'success_alert2');
    }

    // Méthode pour supprimer avec soft delete
    public function destroy($id)
    {
        // Trouver l'utilisateur avec ses objets associés
        $utilisateur = Utilisateur::with('objets')->findOrFail($id);

        // Vérifier si l'utilisateur a des objets associés
        if ($utilisateur->objets->isNotEmpty()) {
            // Supprimer les objets associés
            Objet::where('id_utilisateur', $id)->delete();
        }

        // Supprimer l'utilisateur
        $utilisateur->delete();

        return redirect()->route('admin.page.liteutilisateur')->with('alert_type', 'success_alert');
    }

    //Methode pour modifier un Utilisateur
    public function traitement(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'adresse' => 'required|max:100',
            'telephone' => 'required|max:14',
        ]);

        // Trouver l'utilisateur à mettre à jour
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return redirect()->route('admin.page.liteutilisateur')->with('error', 'Utilisateur introuvable.');
        }

        // Mettre à jour les données de l'utilisateur
        $utilisateur->update([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'adresse' => $validated['adresse'],
            'telephone' => $validated['telephone'],
        ]);

        // Redirection après la mise à jour
        return redirect()->route('admin.page.liteutilisateur')->with('alert_type', 'success_alert3');
    }

    //Methode pour recuperer la liste des annonces
    public function listeanonce()
    {
        $objets = Objet::paginate(3);
        return view('admin.page.listeanonce', compact('objets'));
    }

    //Methode pour recuperer la liste des objet Perdu
    public function listeobjetperdu()
    {
        // Filtre pour les objets perdus
        $objets = Objet::where('statut', 'perdu')->paginate(3);
        return view('admin.page.listeobjetperdu', compact('objets'));
    }

    //Methode pour recuperer la liste des objet retrouver
    public function listeobjetretrouver()
    {
        // Filtre pour les objets retrouvés
        $objets = Objet::where('statut', 'retrouve')->paginate(3);
        return view('admin.page.listeobjetretrouver', compact('objets'));
    }

    // Methode pour Ajouter un admin (formulaire)
    public function ajouteradmin()
    {
        return view('admin.page.ajoutadmin'); // Vue pour ajouter un utilisateur
    }
    private function setSuccessAndRedirect($message, $titre, $redirectUrl = "admin")
    {
        session()->flash('success', $message);
        return redirect($redirectUrl . "?success=1&message=" .
               urlencode($message) . "&titre=" . urlencode($titre));
    }

    //Methode pour recupere, valider et cree admin
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'email' => 'required|max:30',
            'password' => 'required',
            'telephone' => 'required|max:17',
        ]);

        // Création de l'utilisateur
        Administrateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hashage du mot de passe
            'telephone' => $validated['telephone'],
        ]);

        // Redirection après la création
        return redirect()->route('admin.page.ajouteradmin')->with('success_alert', true);

    }

    //Methode pour recuperer la liste des admin
    public function listeadmin()
    {
        $utilisateurs = Administrateur::paginate(5);
        return view('admin.page.listeadmin', compact('utilisateurs'));
    }

    //Methode pour ajouter une annonce
    public function ajoutAnnonce()
    {
        return view('admin.page.ajoutanonce'); // Vue pour ajouter un utilisateur
    }

    //Methode pour recupere, valider et cree anonce
    public function store1(Request $request)
    {
        Log::info('Requête reçue : ', $request->all());

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:255',
            'sous_categorie' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'adresse' => 'required|string',
            'lieu_perte' => 'required|string',
            'date_perte' => 'required|date',
            'statut' => 'required|string|in:retrouve',
        ]);

        $categorie = Categorie::firstOrCreate(['nom' => $request->categorie]);
        Log::info('Catégorie créée ou existante : ', ['id' => $categorie->id]);

        $souscategorie = SousCategorie::firstOrCreate([
            'nom' => $request->sous_categorie,
            'id_categorie' => $categorie->id,
        ]);
        Log::info('Sous-catégorie créée ou existante : ', ['id' => $souscategorie->id]);

        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);
        Log::info('Utilisateur créé : ', ['id' => $utilisateur->id]);

        $objet = Objet::create([
            'titre_anonce' => $request->titre,
            'description' => $request->description,
            'id_utilisateur' => $utilisateur->id,
            'id_sous_categorie' => $souscategorie->id,
            'id_categorie' => $categorie->id,
            'lieu_perte' => $request->lieu_perte,
            'date_perte' => $request->date_perte,
            'statut' => $request->statut ?? 'retrouve',
        ]);
        Log::info('Objet créé : ', ['id' => $objet->id]);


        return redirect()->route('admin.page.ajoutanonce')
                        ->with('success', 'Annonce ajoutée avec succès');
    }

    // Méthode pour récupérer les messages
    public function messagerecue()
    {
        $message = Contact::all();  // Utilisation de 'all()' en minuscule
        return view('admin.page.message', compact('message'));  // Nom de vue corrigé
    }

    //Methode pour modifier un Admin
    public function modifieradmin(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'adresse' => 'required|max:100',
            'telephone' => 'required|max:14',
            'email' => 'required|email|unique:administrateurs,email,' . $id, // Validation unique de l'email sauf pour l'ID actuel
        ]);

        // Trouver l'administrateur à mettre à jour
        $administrateur = Administrateur::find($id);

        if (!$administrateur) {
            return redirect()->route('admin.page.liteutilisateur')->with('error', 'Utilisateur introuvable.');
        }

        // Mettre à jour les données de l'administrateur
        $administrateur->update([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'adresse' => $validated['adresse'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
        ]);

        // Redirection après la mise à jour
        return redirect()->route('admin.page.listeadmin')->with('alert_type', 'success_alert3');
    }

    // Méthode pour supprimer avec soft delete UN ADMIN
    public function supprimeradmin($id)
    {
        // Trouver l'utilisateur avec ses objets associés
        $admin = Administrateur::findOrFail($id);

        // Supprimer l'utilisateur
        $admin->delete();

        return redirect()->route('admin.page.listeadmin')->with('alert_type', 'success_alert');
    }

    // Méthode pour afficher les informations de l'utilisateur connecté
public function profil()
{

}


}
