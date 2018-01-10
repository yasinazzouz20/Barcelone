<?php
include '../include/config.php';

$query = "SELECT * FROM equipe";
$data = selectEmployees($query);

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $delete = "DELETE FROM equipe WHERE ID=" . $id;
    $deleteUser = updateEmployees($delete);

    if ($deleteUser != 0) {
        header("Location: index.php");
    } else {
        echo 'error in delete';
    }
}
?>
<br />
<div align="right">
    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg" onclick="document.location.href = 'http://localhost/Barcelone/index.php?page=add';">Ajouter</button>
</div>
<br /><br />

<table>
    <tr>
        <td>ID&nbsp;&nbsp;&nbsp;</td><td>NOM&nbsp;&nbsp;&nbsp;</td><td>AGE&nbsp;&nbsp;&nbsp;</td><td>Edit&nbsp;&nbsp;&nbsp;</td><td>Delete</td>
    </tr>

    <?php
    if (!empty($data)):
        foreach ($data as $user):
            ?>
            <tr>

              <td id="blanc"><?php echo $user['ID']; ?></td>&nbsp;&nbsp;&nbsp;
             <td id="blanc"><?php echo $user['nom']; ?></td>&nbsp;&nbsp;&nbsp;
             <td id="blanc"><?php echo $user['age']; ?></td>&nbsp;&nbsp;&nbsp;
            <td><a  href="../edit.php?id=<?php echo $user['ID']; ?>">Edit</a></td>&nbsp;&nbsp;&nbsp;
            <td><a href="index.php?deleteid=<?php echo $user['ID']; ?>">Delete</a></td>&nbsp;&nbsp;&nbsp;
        </tr>
        
        <?php
    endforeach;
else:
    echo "<h4>Pas de joueurs trouves!</h4>";
endif;
?>

</table>