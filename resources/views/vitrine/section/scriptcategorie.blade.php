<script>
    // Les sous-catégories pour chaque catégorie
    const sousCategories = {
        documents: [
            "Passeport",
            "Carte d'identité",
            "Permis de conduire",
            "Certificats",
            "Livrets bancaires"
        ],
        electroniques: [
            "Téléphone portable",
            "Ordinateur portable",
            "Tablette",
            "Appareils photo",
            "Casque audio"
        ],
        accessoires: [
            "Portefeuille",
            "Bijoux",
            "Lunettes",
            "Clés",
            "Sac à main ou sac à dos"
        ],
        vetements: [
            "Vestes",
            "Chapeaux",
            "Écharpes",
            "Gants"
        ],
        transport: [
            "Vélo",
            "Trottinette",
            "Valise ou bagage"
        ],
        divers: [
            "Parapluie",
            "Livres",
            "Instruments de musique",
            "Jouets"
        ],
        argent: [
            "Espèces",
            "Chèques",
            "Carte bancaire"
        ]
    };

    // Fonction qui met à jour la sous-catégorie en fonction de la catégorie sélectionnée
    document.getElementById('categorie').addEventListener('change', function() {
        const categorie = this.value;
        const sousCategorieSelect = document.getElementById('sous-categorie');

        // Vider les options actuelles
        sousCategorieSelect.innerHTML = '<option>-- Sélectionner --</option>';

        // Vérifier si des sous-catégories existent pour la catégorie choisie
        if (categorie && sousCategories[categorie]) {
            sousCategories[categorie].forEach(subCat => {
                const option = document.createElement('option');
                option.value = subCat.toLowerCase().replace(/\s+/g, '-');
                option.textContent = subCat;
                sousCategorieSelect.appendChild(option);
            });
        }
    });
</script>
