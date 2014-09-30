<?php
include '../include/sql/include_dao.php';
$daoFactory = new DAOFactory();
if (isset($_COOKIE['username'])) {
    if($daoFactory->getRoleDAO()->load($daoFactory->getUserDAO()->queryByUsername($_COOKIE['username'])->roleId)->roleName == "Administrator") {

        include '../include/header.php';
    }
    
    elseif ($daoFactory->getRoleDAO()->load($daoFactory->getUserDAO()->queryByUsername($_COOKIE['username'])->roleId)->roleName == "Normal User") {
        include '../include/header_user.php';
}

}  else {
    header('location:../pages/logout.php');
}



include('../special/daoPagination.php');

$role = new Role();
?>
<div class="pagetitle icon-48-article">
    <h2>Role Update</h2></div>
<?php
//if (isset($_SESSION['error_message'])) {
//    echo $_SESSION['error_message'];
//    unset($_SESSION['error_message']);
//}
//if (isset($_SESSION['op_message'])) {
//    echo $_SESSION['op_message'];
//    unset($_SESSION['op_message']);
//}
?>


<div class="width-60 fltlft">
    <fieldset class="adminform">

        <form name="update_form" method="POST" id="item-form" class="form-validate">
            <?php
            $_SESSION['role'] = $_GET['id'];
            $role = $daoFactory->getRoleDAO()->load($_SESSION['role']);
            ?>
            <table width="107%" class="adminlist">
                <tbody>
                       <tr class="row1">
                        <td>Role Name</td>
                        <td><input name="name" id="village" size="30" maxlength="40" value="<?php echo $role->roleName; ?>" /></td>
                    </tr>
                   
                    <tr class="row1">
                        <td><label for="phone">  Role Description:</label></td>
                        <td><label>
                                <textarea name="description" id="description" cols="45" rows="5"><?php echo $role->roleDescription; ?></textarea>
                            </label></td>
                    </tr>
                    
                    <tr class="row1">

                        <td align="center"><input type="reset" name="clear" value="Clear form" /></td>
                        <td align="center">
                            <input type="submit" name="update" id="save" value="Save Changes" /></td>
                    </tr>
                </tbody>
            </table>
        </form>


    </fieldset>

</div>

<?php
if (isset($_POST['update'])) {
    
    $role = $daoFactory->getRoleDAO()->load($_SESSION['role']);
        
    $role->roleName = $_POST['name'];
    $role->roleDescription = $_POST['description'];
    
    $daoFactory->getRoleDAO()->update($role);
           
    header('location:index.php');
    
}
?>
<div class="clr"></div>


<?php include '../include/bottom.php'
?>