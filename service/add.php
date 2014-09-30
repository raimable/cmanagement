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

$service = new service();
?>
<div class="pagetitle icon-48-article">
    <h2>Service registration</h2></div>
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

<div class="width-70 fltlft">
    <fieldset class="adminform">
        <form name="update_form" method="POST" id="item-form" class="form-validate">

            <table class="adminlist">
                <tbody>
                    <tr class="row1">
                        <td width="38%"><label for="serviceDescription"> Service Description : </label></td>
                        <td width="62%"><input type="text" name="serviceDescription" size="40" maxlength="120"/></td>
                    </tr>
                    
                    
                    

                    <tr class="row1">

                        <td align="center"><input type="reset" name="clear" value="Clear form" /></td>
                        <td align="center">
                            <input type="submit" name="save" id="save" value="Save New Service" /></td>
                    </tr>

                    
                    </tbody>
                </table>
            </form>

        </fieldset>

    </div>
    <?php
    if (isset($_POST['save'])) {

        $service->serviceDescription = $_POST['serviceDescription'];
      
        $daoFactory->getServiceDAO()->insert($service);
        
        
    }
    ?>
    <div class="clr"></div>


    <?php include '../include/bottom.php' ?>