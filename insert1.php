<?php
require_once 'connection.php';
echo "<table border='1'>
    <tr>
    <th>Nume</th>
    <th>Culoare</th>
    <th>Marime</th>
    <th>Pret</th>
    </tr>";
$sql="SELECT * FROM flori";
foreach ($con->query($sql) as $row)
        {
    echo "<tr>";
    echo "<td>".$row['nume']."</td>";
    echo "<td>".$row['culoare']."</td>";
    echo "<td>".$row['marime']."</td>";
    echo "<td>".$row['pret']."</td>";
        }
        $sql1="DROP PROCEDURE IF EXISTS procedura1";
$sql2="CREATE PROCEDURE procedura1( 
 IN strNume varchar(30), 
 IN strCuloare varchar(30),
 IN strMarime varchar(30),
 IN intPret int
) 
BEGIN 
      INSERT INTO flori
       ( nume,culoare,marime, pret)
VALUES (strNume, strCuloare, strMarime, intPret);
END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
$nume="trandafiri";
$culoare="rosii";
$marime="mari";
$pret="445";
$sql3="CALL procedura1('{$nume}','{$culoare}','{$marime}','{$pret}')";
//$sql2="CALL insertFlower('11111','2222','33333','121212')";
$q=$con->query($sql3);
if($q){
    echo "Data was successfully inserted";
}  else {
echo "Vai vai vai!!!";    
}
echo "<br><br>";
echo "<table border='1'>
    <tr>
    <th>Nume</th>
    <th>Culoare</th>
    <th>Marime</th>
    <th>Pret</th>
    </tr>";
$sql4="SELECT * FROM flori";
foreach ($con->query($sql4) as $row)
        {
    echo "<tr>";
    echo "<td>".$row['nume']."</td>";
    echo "<td>".$row['culoare']."</td>";
    echo "<td>".$row['marime']."</td>";
    echo "<td>".$row['pret']."</td>";
        }
?>
