<?php
include '../include/config.php';

$query = "SELECT * FROM equipe";
$data = selectEmployees($query);

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
        $delete="DELETE FROM equipe WHERE ID=".$id;
        $deleteUser=updateEmployees($delete);

        if($deleteUser!=0){
            header("Location: index.php");
        }else{
            echo 'error in delete';
        }    
    
}


?>

<table>
    <tr>
        <td>ID</td><td>NOM</td><td>AGE</td><td>Edit</td><td>Delete</td>
    </tr>

    <?php

    if(!empty($data)):
    foreach ($data as $user):
    ?>
    <tr>
        <td><?php echo $user['ID']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td><a href="../edit.php?id=<?php echo $user['ID']; ?>">Edit</a></td>
        <td><a href="index.php?deleteid=<?php echo $user['ID']; ?>">Delete</a></td>
    </tr>
    <?php
    endforeach;
    else:
        echo "<h4>Pas de joueurs trouves!</h4>";
    endif;
    ?>

</table>