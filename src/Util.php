<?php

namespace PokemonAPI;


class Util {
    
    // Curl utility function to request pokemon from pokeapi
    public static function apiRequest($url){
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, $url);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);

        $output = curl_exec($handle);
        $status = curl_getinfo($handle,CURLINFO_HTTP_CODE);
        curl_close($handle);

        if($status != 200){
            return json_encode("RESOURCE NOT FOUND");
        }

        return $output;

    }

     // gets the contents of a file if it exists, otherwise make requests and caches
     public static function getContent($file,$url) {
        
        $current_time = time(); // gets current time
        $expire_time = 24 * 7 * 60 * 60; // get time in seconds of 7 days - 24hrs * 7 days * 60mins * 60secs
        
        if(file_exists($file) && ($current_time - $expire_time < filemtime($file))) {
            //get data responses from cache file
            return file_get_contents($file);
        }
        else {
            //make fresh requests for pokemons and cache
            $content = $this->apiRequest($url);
            file_put_contents($file,$content);
            return $content;
        }
    }
}