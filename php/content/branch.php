<?php
if (isset($_POST['bt_add'])) {
    header('Location:add.php');
    exit();
}
elseif (isset($_POST['bt_data'])) {
    header('Location:data.php');
    exit();
}
elseif (isset($_GET['edit_type'])) {
    $edit_type = $_GET['edit_type'];
    $idx       = $_GET['idx'];

    if ($edit_type == "disp")
        header('Location:disp.php?idx='.$idx);
    else if ($edit_type == "edit")
        header('Location:edit.php?idx='.$idx);
    else if ($edit_type == "clr")
        header('Location:clr.php?idx='.$idx);
    exit();
}


?>