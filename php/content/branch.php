<?php
if (isset($_POST['bt_add'])) {
    header('Location:add.php');
    exit();
} elseif (isset($_POST['bt_data'])) {
    header('Location:data.php');
    exit();
}
?>