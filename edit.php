<?php

include './include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$selectEmployee="SELECT * FROM equipe WHERE ID=".$id;

$user=selectEmployees($selectEmployee);


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pos = $_POST['position'];

    $query = "UPDATE equipe SET ID='" . $name . "',nom='" . $email . "',age='" . $pos . "' WHERE ID=".$id;

    $update = updateEmployees($query);

    if ($update != 0) {
        echo 'joueur updated successfully';
    }else{
        echo 'error in update query';
    }
}
?>

<form method="post">
    <input type="text" name="name" value="<?php echo $user[0]['ID']; ?>"> <br>
    <input type="text" name="email" value="<?php echo $user[0]['nom']; ?>"> <br>
    <input type="text" name="position" value="<?php echo $user[0]['age']; ?>"> <br>
    <input type="submit" name="submit" value="Edit">
    <input type="button" class="btn" id="Retour" value="Retour" onclick="document.location.href='http://localhost/barcelone/admin/index.php?page=tabl_dynamique2';" />
</form>