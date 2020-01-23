<form method='post' id='userform' action=''> <tr>
    <td>Trouble Type</td>
    <td>
    <input type='checkbox' name='checkboxvar[]' value='Option One'>1<br>
    <input type='checkbox' name='checkboxvar[]' value='Option Two'>2<br>
    <input type='checkbox' name='checkboxvar[]' value='Option Three'>3
    </td> </tr> </table> <input type='submit' class='buttons'> </form>

<?php 
if (isset($_POST['checkboxvar'])) 
{
    print_r($_POST['checkboxvar']); 
    echo "<br>";
    echo $string = serialize( $_POST['checkboxvar'] );
    echo "<br>";
    
    $array1 = unserialize( $string );
    print_r($array1); 
}
?>