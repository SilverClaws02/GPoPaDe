dbcontroller_mysqli_test.php
<?php
require_once 'dbcontroller_mysqli.php';

//very simple test
echo "Teszt indul ...". "<br>";

//példányosítás
$db=new DBVezerlo();

//kapcsolat ellenőrzése
if($db->connectDB())
{
    echo "Kapcsolat sikeres." . "<br>";
}
else
{
    echo "Kapcsolat sikertelen." . "<br>";
    exit;
}

//select teszt
$query="SELECT * from products";
echo "Lekérdezés futtatása." ."<br>";
$result=$db->executeSelectQuery($query);
if(!empty($result))
{
    echo "Lekérdezés eredménye: ". "<br>";
    print_r($result);
}
else
{
    echo "Nincs visszaadott érték: ". "<br>";
}

//kapcs lezárás
$db->closeDB();
echo "Kapcsolat lezárva." ."<br>";

echo "Teszt vége." ."<br>";