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

$user = new User();
?>
<div class="pagetitle icon-48-article">
    <h2>User Update</h2></div>
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
            $_SESSION['user'] = $_GET['id'];
            $user = $daoFactory->getUserDAO()->load($_SESSION['user']);
            ?>
            <table width="107%" class="adminlist">
                <tbody>
                       <tr class="row1">
                        <td width="38%"><label for="names"> Names : </label></td>
                        <td width="62%"><input type="text" name="names" size="40" maxlength="120" value="<?php echo $user->names; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="username"> Username : </label></td>
                        <td width="62%"><input type="text" name="username" size="40" maxlength="120" value="<?php echo $user->username;?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="password"> Initial Password: </label></td>
                        <td width="62%"><input type="password" name="password" size="40" maxlength="120" value="<?php echo $user->password?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="passwordConfirm"> Confirm Password : </label></td>
                        <td width="62%"><input type="password" name="passwordConfirm" size="40" maxlength="120" value="<?php echo $user->password;?>"/></td>
                    
                    
                    </tr><tr class="row1">
                        <td width="43%"><strong>Select Role</strong></td>
                        <td width="57%"><select name="lstRoles" id="lstRoles">
                                <option value="">--Select Role--</option>  
                                <?php
                                foreach ($daoFactory->getRoleDAO()->queryAll() as $role) {
                                    ?>
                                    <option value="<?php echo $role->roleId; ?>"><?php echo $role->roleName; ?></option>
                                <?php } ?>
                                </select></td>
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
        
    $user->names = $_POST['names'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    
    if(isset($_POST[lstRoles])){
        
        $user->roleId = $_POST['lstRoles'];
    }
    
    $daoFactory->getUserDAO()->update($user);
    header('location:index.php');
    
}
?>
<div class="clr"></div>


<?php include '../include/bottom.php'
?>