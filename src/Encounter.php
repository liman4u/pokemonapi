<?php

namespace PokemonAPI;

use PokemonAPI\Util as Util;

require_once('./src/Config.php');

class Encounter {

   
    //Get encounters function 
    public static function getEncounters($encounters_link,$id) {

        $encounter_cache_file = ENCOUNTER_CACHE_FILE;
       
        $encounters = json_decode(Util::getContent($encounter_cache_file.$id.'.txt',$encounters_link),true);
        $encounter_locations = array();
        foreach($encounters as $encounter){
            if(strpos($encounter['location_area']['name'],'kanto') !== false){
                $encounter_location = $encounter['location_area']['name'];
                
                foreach($encounter['version_details'] as $version)
                    $encounter_location .= '  ['.$version['version']['name'].':'. $version['encounter_details'][0]['method']['name'].'] ';

                $encounter_locations[] = $encounter_location;
            }
            
                
        }

        return $encounter_locations;
    }


}