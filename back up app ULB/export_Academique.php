 <?php  
    // **********************************   EXPORT TABLE   ACADEMIQUE ************************

       if (isset($_POST["ExportAcad"])) {
  include("connection-bdd-inv.php");

$Academique = "SELECT * FROM Academique";

  $AcademiqueRes = mysqli_query($mysql, $Academique);

$columnHeader = '';  
 $columnHeader = "ZZACAD_ECRAN". "\t". "ZZACAD_TXT_AUTO" . "\t";  
$setData = '';  
  while ($row = mysqli_fetch_row($AcademiqueRes)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Academique.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
  } 
?> 