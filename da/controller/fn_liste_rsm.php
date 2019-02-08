<?php 
ini_set("display_errors",0);
include('database.php');
$pdo1 = Database1::connect();
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*$ret = array();
$qr = "select name from user where classcode in (310,400,520) order by name "; 

foreach ($pdo1->query($qr) as $row)
{  $ret[]=array('name'=>$row['name']);}

echo json_encode($ret);
*/

echo "<select>";
$query="select name from user where classcode in (310,400,520) order by name";
$del = $pdo1->prepare("select name from user where classcode in (310,400,520) order by name " );
$del->execute();
$count = $del->rowCount();
$result = $pdo1->query($query);
$numresult=$count;
foreach ($pdo1->query($query) as $row)
    {
   $i++; if ($i<$count)
   {
       echo "<option value='$row[name]'>$row[name]</option>";
    }}
echo "</select>";


?>