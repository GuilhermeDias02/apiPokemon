Nous créons une structure API Pokemon avec les fonctionnalités de Pokedex, dresseur et boites pc.

1. **API de Gestion du Pokedex enregistrés :**
   - **Endpoints :**
     - `GET /api/pokedexes`: Récupère la liste des Pokemon du Pokedex.
     - `GET /api/pokedexes/{id}`: Récupère un Pokemon du Pokedex.
     - `POST /api/pokedexes`: Ajoute un nouveau Pokémon au Pokedex.
     - `PUT /api/pokedexes/{id}`: Remplace un Pokemon par un autre.
     - `PATCH /api/pokedexes/{id}`: Corrige un Pokemon du Pokedex.
     - `DELETE /api/pokedexes/{id}`: Supprime un Pokémon du Pokedex.

2. **API de Gestion des Boites PC :**
   - **Endpoints :**
     - `GET /api/pc_boxes`: Récupère la liste des Pokemon capturés ou vus.
     - `GET /api/pc_boxes/{id}`: Récupère un Pokemon d'une boite Pc.
     - `POST /api/pc_boxes`: Ajoute un nouveau Pokemon au Pc.
     - `PUT /api/pc_boxes/{id}`: Remplace un Pokemon du Pc par un autre.
     - `PATCH /api/pc_boxes/{id}`: Corrige un Pokemon du Pc.
     - `DELETE /api/pc_boxes/{id}`: Supprime un Pokemon du Pc.

3. **API de Gestion des Dresseurs :**
   - **Endpoints :**
     - `GET /api/trainers`: Récupère la liste des Dresseurs.
     - `GET /api/trainers/{id}`: Récupère un Dresseur.
     - `POST /api/trainers`: Ajoute un nouveau Dresseur.
     - `PUT /api/trainers/{id}`: Remplace un Dresseur par un autre.
     - `PATCH /api/trainers/{id}`: Corrige un Dresseur.
     - `DELETE /api/trainers/{id}`: Supprime un Dresseur.

4. **API de Gestion des Types :**
   - **Endpoints :**
     - `GET /api/types`: Récupère la liste des Types.
     - `GET /api/types/{id}`: Récupère un Type.
     - `POST /api/types`: Ajoute un nouveau Type.

5. **Recherche / filtrage dans le Pokedex:**
   - **Endpoints :**
     - `GET /api/pokedexes?region.id={id}`: filtre les pokemons par région (1-9).
     - `GET /api/pokedexes?type.id={id}`: filtre les pokemons par type (1-18).
     - `GET /api/pokedexes?idPokedex={id}`: filtre les pokemons par leur numero de Pokedex.
     - `GET /api/pokedexes?name={string}`: filtre les pokemons par leur nom.

6. **Recherche / filtrage dans le Pc:**
   - **Endpoints :**
     - `GET /api/pc_boxes?idTrainer.id={id}`: cherche tous les pokemons d'un dresseur.
     - `GET /api/pc_boxes?idPokedex.id={id}`: cherche un certain pokemon dans toutes les boites Pc.
     - `GET /api/pc_boxes?captures={bool}`: cherche les pokemons qui sont captures(1) ou vus(0).

**Tous les filtres peuvent être mélangés**