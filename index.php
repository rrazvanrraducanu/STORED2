<?php
require_once 'connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
 $sql1="DROP PROCEDURE IF EXISTS GetFlori";
$sql2="CREATE PROCEDURE GetFlori()
BEGIN
SELECT * FROM flori;
END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
$sql3="CALL GetFlori()";
$q=$con->query($sql3);
if($q){
   ?>

<table>
    <tr>
        <th>Nume</th>
        <th>Culoare</th>
        <th>Marime</th>
        <th>Pret</th>
    </tr>
    <?php while ($res=$q->fetch()): ?>
    <tr>
        <td><?php echo $res['nume']; ?></td>
        <td><?php echo $res['culoare']; ?></td>
        <td><?php echo $res['marime']; ?></td>
        <td><?php echo $res['pret']; ?></td>
    </tr>
     <?php endwhile; ?>
</table>
<br/><br/>
        
        <a href="insert1.php">Insert1</a><br/><br/>
        <a href="insert2.php">Insert2</a><br/><br/>
      
    </body>
</html>
<?php 
}  else {
echo "Vai vai vai!!!";    
}
?>