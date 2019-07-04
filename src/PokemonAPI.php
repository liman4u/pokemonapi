<?php

namespace PokemonAPI;

use PokemonAPI\Pokemon as Pokemon;
use PokemonAPI\Util as Util;
use PokemonAPI\Encounter as Encounter;

require_once('./src/Config.php');


class PokemonAPI {

    public function __construct(){
        $this->baseURL = BASE_URL;
        $this->pokemon_cache_file = POKEMON_CACHE_FILE;
    }

    public function getPokemon($id_or_name){
        $url = $this->baseURL . 'pokemon/'.$id_or_name;

        $output =  Util::getContent($this->pokemon_cache_file . $id_or_name.'.txt',$url);

        return $output;
    }

    /* utility function */
    public function formatResponse($content) {
        $id = $content['id'];
        $name = $content['name'];
        $types = array();
        foreach($content['types'] as $type){
            $types[] = $type['type']['name'];
        }
        $stats = array();
        foreach($content['stats'] as $stat){
            $stats[] = $stat['stat']['name'].':'.$stat['effort'];
        }

        $encounter_locations = Encounter::getEncounters($content['location_area_encounters'],$id);
        

        $pokemon = new Pokemon();
        $pokemon->id = $id;
        $pokemon->name = $name;
        $pokemon->types = $types;
        $pokemon->stats = $stats;
        if(count($encounter_locations) == 0) $encounter_locations = '-';
        $pokemon->encounters = $encounter_locations;

        return $pokemon;
    }


    

}