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

?>
<div class="pagetitle icon-48-article"><h2>Partner registration</h2></div>
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
        <legend>New Partner Registration</legend>
        <form name="update_form" method="POST" id="item-form" class="form-validate">

            <table class="adminlist">
                <tbody>

                    <tr class="row1">
                        <td>Partner Name</td>
                        <td><input name="partnerName" id="village" size="30" maxlength="40" /></td>
                    </tr>

                    <tr class="row1">
                        <td>Bank Account</td>
                        <td><input name="bankAccount" id="village" size="30" maxlength="40" /></td>
                    </tr>

                    <tr class="row1">
                        <td>Account Provider</td>
                        <td><input name="bankAccountProvider" id="village" size="30" maxlength="40" /></td>
                    </tr>

                    <tr class="row1">
                        <td width="43%"><strong>Select Service</strong></td>
                        <td width="57%"><select name="lstService" id="lstService">
                                <option value="">--Select service--</option>  
                                <?php
                                foreach ($daoFactory->getServiceDAO()->queryAll() as $service) {
                                    ?>
                                    <option value="<?php echo $service->serviceId; ?>"><?php echo $service->serviceDescription; ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>                    
                    <tr class="row1">

                        <td align="center"><input type="reset" name="clear" value="Clear form" /></td>
                        <td align="center">
                            <input type="submit" name="save" id="save" value="Save New Partner" /></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </fieldset>

</div>
<?php
if (isset($_POST['save'])) {

    $partner->partnerName = $_POST['partnerName'];
    $partner->bankAccount = $_POST['bankAccount'];
    $partner->bankAcoountProvider = $_POST['bankAccountProvider'];
    $partner->serviceId = $_POST['lstService'];


    $daoFactory->getPartnerDAO()->insert($partner);
}
?>
<div class="clr"></div>


<?php include '../include/bottom.php' ?>