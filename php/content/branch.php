<?php
if (isset($_POST['bt_add'])) {
    header('Location:add.php');
    exit();
}
elseif (isset($_POST['bt_search'])) {
    header('Location:search.php');
    exit();
}
elseif (isset($_POST['bt_data'])) {
    header('Location:data.php');
    exit();
}
elseif (isset($_GET['edit_type'])) {
    $edit_type = $_GET['edit_type'];

    if ($edit_type == "disp")
        header('Location:disp.php?idx='.$_GET['idx']);
    else if ($edit_type == "edit")
        header('Location:edit.php?idx='.$_GET['idx']);
    else if ($edit_type == "clr")
        header('Location:del_confirm.php?idx='.$_GET['idx']);
    exit();
}


?>