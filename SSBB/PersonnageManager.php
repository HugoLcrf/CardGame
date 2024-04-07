<?php

class PersonnageManager {

    private $db;
    private $personnages = [];

    
    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }

    public function addPersonnage(Personnage $player) {
        $nom = $player->getNom();
        $img = $player->getImg();
        $atk = $player->getAtk();
        $pv = $player->getPv();
        
        $q = $this->db->prepare("INSERT INTO `personnages` (`nom`, `img`, `atk`, `pv`) VALUES (:nom, :img, :atk, :pv)");

        $q->execute();
    }

    public function update(Personnage $player) {
        $query = $this->db->prepare('UPDATE personnages SET nom = :nom, atk = :atk, pv = :pv WHERE id = :id');
        $query->bindValue(':nom', $player->getNom(), PDO::PARAM_STR);
        $query->bindValue(':atk', $player->getAtk(), PDO::PARAM_INT);
        $query->bindValue(':pv', $player->getPv(), PDO::PARAM_INT);
        $query->bindValue(':id', $player->getId(), PDO::PARAM_INT);
        $query->execute();
      }

    
      public function getOnePersonnageById($id) {
        $query = "SELECT * FROM personnages WHERE id = :id";
        $requete = $this->db->prepare($query);
        $requete->execute(array("id" => $id));
        $result = $requete->fetch();
        if ($result) {
            return new Personnage($result);
        } else {
            return null;
        }
    }

public function removePlayers() {
    $q = $this->db->prepare("UPDATE personnages SET player_number = 0");
    $q->execute();
}

public function getAllPersonnages() {
    $personnages = [];
    $query = $this->db->query("SELECT id, nom, atk, pv FROM personnages");
    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
        $personnages[] = new Personnage($data);
    }
    return $personnages;
}

public function delete(Personnage $personnage) {
    $this->db->exec('DELETE FROM personnages WHERE id = ' . $personnage->getId());
    
  }
  

    public function die(Personnage $personnage) {
        if ($personnage->getPv() <= 0) {
            $q = $this->db->prepare("UPDATE personnages SET player_number = 0");
            $q->execute();
            $personnage->reinitPv();
            $this->update($personnage);
            header("Location: index.php");
            exit(); 
        }
    }




}




