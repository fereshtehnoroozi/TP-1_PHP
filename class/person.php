<?php
class person  {
     
    public function getPersons(){

        global $oPDO;

        $oPDOStatment = $oPDO -> query ('SELECT id, nom, prenom, annee FROM person ORDER BY id ASC');
        $persons = $oPDOStatment -> fetchAll (PDO::FETCH_ASSOC);

        return $persons;
    }

    public function getPersonById($id){

        global $oPDO;

        $oPDOStatment = $oPDO -> prepare ('SELECT id, nom, prenom, annee FROM person WHERE id = :id ');
        $oPDOStatment -> bindParam (':id', $id, PDO::PARAM_INT);
        $oPDOStatment -> execute();

        $person = $oPDOStatment -> fetch(PDO::FETCH_ASSOC);
        return $person;
    }

    public function ajouterPerson($person){

        global $oPDO;

        $oPDOStatment = $oPDO -> prepare ('INSERT INTO person SET nom = :nom , prenom = :prenom, annee = :annee ;');
        $oPDOStatment -> bindParam (':nom', $person['nom'], PDO::PARAM_STR);
        $oPDOStatment -> bindParam (':prenom', $person['prenom'], PDO::PARAM_STR);
        $oPDOStatment -> bindParam (':annee', $person['annee'], PDO::PARAM_INT);

        $oPDOStatment -> execute();

        if ($oPDOStatment -> rowCount() <= 0){
            return false;
        }

        return $oPDO -> lastInsertId();
    }

    public function updatePerson($data){
        
        global $oPDO;

        $oPDOStatment = $oPDO -> prepare ('UPDATE person SET nom = :nom , prenom = :prenom, annee = :annee WHERE id = :id;');
        $oPDOStatment -> bindParam (':id', $data['id'], PDO::PARAM_INT);
        $oPDOStatment -> bindParam (':nom', $data['nom'], PDO::PARAM_STR);
        $oPDOStatment -> bindParam (':prenom', $data['prenom'], PDO::PARAM_STR);
        $oPDOStatment -> bindParam (':annee', $data['annee'], PDO::PARAM_INT);
        $oPDOStatment -> execute();

        $person = $oPDOStatment -> fetch(PDO::FETCH_ASSOC);
        return $person;
    }


public function deletePerson($id){
        
    $person = $this -> getPersonById($id);

    if ($person){

    global $oPDO;

    $oPDOStatment = $oPDO -> prepare ('DELETE FROM person WHERE id = :id;');
    $oPDOStatment -> bindParam (':id', $id, PDO::PARAM_INT);
    $result = $oPDOStatment -> execute();

    $person = $oPDOStatment -> fetch(PDO::FETCH_ASSOC);
    return "Le person avec id ".$person['id']. "suprimer";
}
else {
    return "person introuver";
}
}

}