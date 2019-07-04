<?php

namespace PokemonAPI;

class Pokemon {

    public $id;
    public $name;
    public $types;
    public $encounters;
    public $stats;

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
    
    public function getTypes(){

        return $this->types;
    }

    public function getEncounters(){
        return $this->encounters;
    }

    public function getStats(){
        return $this->stats;
    }

    public function getFullOutput(){
        $result = "Pokemon ID: {$this->id}\n";
        $result .= "Pokemon Name: {$this->name}\n";
        $result .= "Pokemon Types: ". implode('|',$this->types)."\n";
        $result .= "Pokemon Encounters: ".implode('|',$this->encounters)."\n";
        $result .= "Pokemon Stats: ".implode('|', $this->stats)."\n";

        return $result;
    }
}