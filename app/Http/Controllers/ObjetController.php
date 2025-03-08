<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objet; // Import du modèle Objet
use App\Models\Utilisateur; // Import du modèle Objet
use App\Models\Categorie; // Import du modèle Objet
use App\Models\SousCategorie; // Import du modèle Objet
use Illuminate\Support\Facades\Log;

class ObjetController extends Controller
{
    //Methode pour affiche la page acceuil
    public function index()
    {
        // Obtenir les objets perdus et retrouvés
        $objetsPerdus = Objet::with('utilisateur')->where('statut', 'perdu')->paginate(3); // Filtrer pour objets perdus
        $objetsRetrouves = Objet::with('utilisateur')->where('statut', 'retrouve')->paginate(3); // Filtrer pour objets retrouvés

        // Passer les objets perdus et retrouvés à la vue
        return view('vitrine.index', compact('objetsPerdus', 'objetsRetrouves'));
    }


    //Methode pour declarer obet perte
    public function declarerperte()
    {
        return view('vitrine.page.perte.declarerperte'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour declarer objet retrouver
    public function declarertrouver()
    {
        return view('vitrine.page.retrouver.declarerretrouver'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour afficher la liste des pertes
    public function listebienperdu(Request $request)
    {
        $query = Objet::where('statut', 'perdu')->with('utilisateur');

        if ($request->filled('categorie')) {
            // Vérifier si la catégorie existe
            $categorie = Categorie::where('nom', $request->categorie)->first();
            if ($categorie) {
                $query->where('id_categorie', $categorie->id);
            } else {
                return back()->with('error', 'Aucun objet trouvé pour cette catégorie.');
            }
        }

        if ($request->filled('sous_categorie') && $request->sous_categorie !== '-- Sélectionner --') {
            // Vérifier si la sous-catégorie existe
            $sousCategorie = SousCategorie::where('nom', $request->sous_categorie)->first();
            if ($sousCategorie) {
                $query->where('id_sous_categorie', $sousCategorie->id);
            } else {
                return back()->with('error', 'Aucun objet trouvé pour cette sous-catégorie.');
            }
        }

        $objets = $query->paginate(5);

        if ($objets->isEmpty()) {
            return back()->with('error', 'Aucun objet trouvé pour votre recherche.');
        }

        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();

        return view('vitrine.page.perte.listebienperdu', compact('objets', 'categories', 'sousCategories'));
    }

    //Methode pour afficher les details
    public function detailobjet($id)
    {
        $objet = Objet::find($id); // Trouver un objet spécifique avec l'ID donné
        if (!$objet) {
            return redirect()->route('vitrine.page.listebienperdu')->with('error', 'Objet introuvable');
        }
        return view('vitrine.page.detailobjet', compact('objet')); // Assurez-vous que 'objet' est passé et non 'objets'
    }

    //Methode pour afficher liste des objets retrouves
    public function listebienretrouver()
    {
        $query= Objet::where('statut', 'retrouve')->with('utilisateur');

        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();

        $objets = $query->paginate(5);
        return view('vitrine.page.retrouver.listebienretrouver', compact('objets', 'categories', 'sousCategories'));
    }

    //Methode pour afficher tous les annonce avec option de filtrage
    public function listebienparcategories()
    {
        // Assurez-vous que vous utilisez le modèle correctement avec la syntaxe 'Objet::'
        $objets = Objet::paginate(5); // La méthode paginate() récupère 5 objets à la fois
        return view('vitrine.page.listebienparcategories', compact('objets')); // Passez les objets à la vue
    }

    //Methode pour afficher la page apropos
    public function apropos()
    {
        return view('vitrine.page.apropos'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour afficher la page contact
    public function contact()
    {
        return view('vitrine.page.contacte'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour afficher la page aide
    public function aide()
    {
        return view('vitrine.page.aide'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour afficher la page politique de conf
    public function politiqueconf()
    {
        return view('vitrine.page.politiqueconf'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

    //Methode pour afficher la page condition d'utilisation
    public function condition()
    {
        return view('vitrine.page.condition'); // Remplacez 'perte.signaler' par le nom exact de votre vue.
    }

     // Gestion des erreurs et redirection
    private function setErrorAndRedirect($message, $titre, $redirectUrl = "index")
    {
         session()->flash('error', $message);
         return redirect($redirectUrl . "?error=1&message=" .
                urlencode($message) . "&titre=" . urlencode($titre));
    }

     // Gestion du succès et redirection
    private function setSuccessAndRedirect($message, $titre, $redirectUrl = "index")
    {
         session()->flash('success', $message);
         return redirect($redirectUrl . "?success=1&message=" .
                urlencode($message) . "&titre=" . urlencode($titre));
    }

    //Methode pour enregistrer objet retrouver
    public function store(Request $request)
    {
        Log::info('Requête reçue : ', $request->all());
         // Forcer la valeur du statut
        $request->merge(['statut' => 'retrouve']);

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
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        $photoPath = null;

        // Si une photo est téléchargée, la stocker
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

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
            'photo' => $photoPath,
        ]);
        Log::info('Objet créé : ', ['id' => $objet->id]);
        return $this->setSuccessAndRedirect(
            "Annonce Objet Retrouve ajoutée avec succès",
            "Ajout Reussie",
            route('vitrine.retrouver.declarertrouver')
        );

    }


    //Methode pour enregistrer objet perdu
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
            'statut' => 'string|in:perdu',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        $photoPath = null;

        // Si une photo est téléchargée, la stocker
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

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
            'statut' => $request->statut ?? 'perdu',
            'photo' => $photoPath,
        ]);
        Log::info('Objet créé : ', ['id' => $objet->id]);
        return $this->setSuccessAndRedirect(
            "Annonce Objet Perte ajoutée avec succès",
            "Ajout Reussie",
            route('vitrine.retrouver.declarertrouver')
        );

        return redirect()->route('vitrine.perte.declarerperte')
                        ->with('success', 'Annonce ajoutée avec succès');
    }

}
