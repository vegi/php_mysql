<?php
$multiCity = array(
    array('City', 'Country', 'Continent'),
    array('Tokyo', 'Japan', 'Asia'),
    array('Mexico City','Mexico', 'North America'),
    array('New York City', 'USA', 'North America'),
    array('Mumbai', 'India', 'Asia'),
    array('Seoul', 'Korea', 'Asia'),
    array('Shanghai', 'China', 'Asia'),
    array('Lagos', 'Nigeria', 'Africa'),
    array('Buenos Aires', 'Argentina', 'South America'),
    array('Cairo', 'Egypt', 'Africa'),
    array('London', 'UK','Europe')
);
?>
<html>
<head>
<title>Multi-dimensional Array</title>
<style type="text/css">
td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
th {text-align:center;}
table {border-collapse: collapse; border: 1px solid black;}
</style>
</head>
<body>
<h2>Auflistung Array<br /></h2>
<table>
<thead>
<tr>
<?php
// table head ausgeben
foreach ($multiCity[0] as $value) {
echo "<th>$value </th>";    
}

?>
</tr>
</thead>
 <?php
// durchiterieren und key/values ausgeben
for ($index = 1; $index < count($multiCity); $index++) 
    {
        echo "<tr>";
        foreach ($multiCity[$index] as $value){
        echo "<td>$value</td>";
    }
    };    

 

?>
 </table>

<h2>Auflistung der St&auml;dte in Asien<br /></h2>
<table>
<thead>
<tr>
<?php
// table head ausgeben
foreach ($multiCity[0] as $value) {
echo "<th>$value </th>";    
}

?>
</tr>
</thead>

<?php
foreach (array_slice($multiCity,1) as $city){
                    if ($city[2] == "Asia"){
                        echo "<tr>";
                        echo "<td>" . $city[0] . "</td>";
                        echo "<td>" . $city[1] . "</td>";
                        echo "<td>" . $city[2] . "</td>";  
                        echo "</tr>";
                    }
                }
 

 ?>
  </tbody>
    </table>



<h2>Auflistung der Kontinente, sowie die Zahl der L&auml;nder darin (im Array)<br /></h2>
<table>
    <tbody>
    <?php

    function array_value_count($string, $array){
        
        $counter = 0;

        foreach ($array as $value){
            
            if ($value[2] == $string){
                $counter++;
            }
        }
        
        return $counter;
    }
   

    $africa = array_value_count("Africa",$multiCity);
    echo "<tr><td>Africa:</td><td>".$africa."</td></tr>";
   
    $asia = array_value_count("Asia",$multiCity);
    echo "<tr><td>Asia:</td><td>".$asia."</td></tr>";
    
    $europe = array_value_count("Europe",$multiCity);
    echo "<tr><td>Europe:</td><td>".$europe."</td></tr>";
    
    $northamerica = array_value_count("North America",$multiCity);
    echo "<tr><td>North America:</td><td>".$northamerica."</td></tr>";
    
    $southamerica = array_value_count("South America",$multiCity);
    echo "<tr><td>South America:</td><td>".$southamerica."</td></tr>";

    ?>
    </tbody>

</table>


<h2>Auflistung nach L&auml;nder A-Z <br /></h2>
<table>
    <tbody>
    <?php

    
?>
    </tbody>

</table>
</body>
</html>