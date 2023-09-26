<?php
$host = "localhost";
$db = "person";
$user = "root";
$password = "";

$dsn = "mysql: host=$host; dbname=$db; charset=UTF8";

global $oPDO;

try {
    $oPDO = new PDO ($dsn ,$user, $password);

    if ($oPDO){
        echo "Connected to the $db databse successfuly";
    }
    
}
    catch(PDOExeption $e){
        echo $e ->getMessage();
}

echo "</br>";
echo "</br>";


require_once "class/person.php";

$operson = new person;
$persons = ($operson->getPersons());

echo "</br>";
echo "</br>";


print_r ($persons[0]);

echo "</br>";
echo "</br>";


//var_dump($persons);


echo "</br>";
echo "</br>";

$person = $operson -> getPersonById(3);
//var_dump($person);


$aperson_to_insert = [

    'nom' => 'Sandra' , 
    'prenom' => 'Julian',
    'annee' => 2002
];
$person_added = $operson -> ajouterPerson($aperson_to_insert);

echo "</br>";
echo "</br>";

//var_dump($operson -> getPersons());

echo "</br>";
echo "</br>";

//update
$person = $operson -> getPersonById(1);
$livre['nom'] = "new person";
$livre['annee'] = 2007 ;
$resualt = $operson -> updatePerson($person);
var_dump($resualt);

echo "</br>";
echo "</br>";

//delete
$resualt = $operson -> deletePerson(5);
var_dump($resualt);
