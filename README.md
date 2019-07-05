 **Technology**

- PHP v7.2

- PokeAPi v2

- Caches Folder in ./caches , eg. encounter_cache_1.txt or pokemon_cache_1.txt

- Testing was done with PhpUnit v8.3

 **Packages**

- This can be found in the composer.json in the root directory of the project


 **How to run**
- Clone for Github
```bash
git clone git@github.com:liman4u/pokemonapi.git

cd pokemonapi

composer install

```


- If you are running from zipped folder , unzip and cd into the folder (This comes with the vendor folder):

- Tests can also be run separately by running[from the project's root folder] 
```bash
composer test tests/PokemonTests.php
```

 **Features**

The API  provide the following functionality:

- Get pokemon details with id , name ,stats, types and encounters
- Caches responses for 1 week

 **Usage**

```bash
use PokemonAPI\PokemonAPI;

$api = new PokemonAPI();
$content = json_decode($api->getPokemon('ditto'),true);
$output = $api->formatResponse($content)->getFullOutput();

Example of Output :

Pokemon Id: 132
Pokemon Name: ditto
Pokemon Types: normal
Pokemon Encounters: kanto-route-13-area  [red:walk]   [blue:walk]   [firered:walk]   [leafgreen:walk] |kanto-route-14-area  [red:walk]   [blue:walk]   [firered:walk]   [leafgreen:walk] |kanto-route-15-area  [red:walk]   [blue:walk]   [firered:walk]   [leafgreen:walk] |kanto-route-23-area  [red:walk]   [blue:walk] 
Pokemon Stats: speed:0|special-defense:0|special-attack:0|defense:0|attack:0|hp:1
``` 
