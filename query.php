<?php
include_once('conexion.php');

if($conexion->conectarDB()){
        
    $sql = "SELECT 
	pp.BusinessEntityID,
	pp.FirstName,
	pp.LastName,
	CAST(pp.ModifiedDate AS DATE) as NewDate
    FROM AdventureWorks2017.Person.Person AS PP
    WHERE PP.FirstName LIKE '%ron' 
    ORDER BY PP.FirstName
    ";

    $datos = $conexion->ejecutarConsulta($sql);
    $cont = 0;
    echo "
    <table>
        <tr>
            <th>Index</th>
            <th>BusinessEntityID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>ModifiedDate</th>
        </tr>";
    foreach($datos as $row){
        echo "<tr>
                <td>".++$cont."</td>
                <td>".$row['BusinessEntityID']."</td>
                <td>".$row['FirstName']."</td>
                <td>".$row['LastName']."</td>
                <td>".$row['NewDate']."</td>
                </tr>";

    }
    echo "</table>";
}
?>