<?php

class Personnage {

private static $compteur = 0;
const MAXLIFE=100;
private $id;
private $img;
private $pv;
private $atk;
public $nom;

public function setId($id){ 
    $this->id=$id;
}
public function setnom(string $nom){ 
    $this->nom=$nom;
}
public function setPv(int $pv){
    if ($pv > 200) {$pv=200;} 
    $this->pv=$pv;
}

public function setAtk(int $atk){ 
    $this->atk=$atk;
}

public function  getId(){
    return $this->id;
}
public function  getnom(){
    return $this->nom;
}
public function  getPv(){
    return $this->pv;
}

public function  getAtk(){
    return $this->atk;
}


public static function getCompteur() {
        return self::$compteur;
}

public function hydrate(array $donnees){
    foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
    }
}

public function __construct(array $donnees) {
    if (isset($donnees['id'])) {
        $this->id = $donnees['id'];
    }

        $this->hydrate($donnees);
        self::$compteur++;
    }


public function heal($x=NULL){
    if (is_null($x)){
        $this->pv=100;
    
    } else {
    $this->pv+=$x;
    }
}

public function is_alive(){
    return $this->pv>0;
}

public function attack(Personnage $perso){
    $perso->setPv($perso->pv - $this->atk);
}

function reinitPv(){
    $this->setPv(self::MAXLIFE);
}

}
?>