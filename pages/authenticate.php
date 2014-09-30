<?php
setcookie('username', $_POST['username'] ,time()+3600,'/');

include '../include/sql/include_dao.php';


$daoFactory = new DAOFactory();
$user = new User();
if ($daoFactory->getUserDAO()->queryByUsername($_POST['username'])) {
    $user = $daoFactory->getUserDAO()->queryByUsername($_POST['username']);
    if ($user->password == md5($_POST['password'])) {
        if ($daoFactory->getRoleDAO()->load($user->roleId)->roleName == 'Normal User') {
            header('location:../consumption/index.php');
        } else if ($daoFactory->getRoleDAO()->load($user->roleId)->roleName == 'Administrator') {
            header('location:../user/index.php');
        } 
    } else {

        echo 'Username or Password do not match';
    }
} else {

    echo 'User not found in system';
}
?>