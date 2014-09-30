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

$consumption = new Customer();
?>
<div class="pagetitle icon-48-article">
    <h2>Customer Update</h2></div>
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
            $_SESSION['customer'] = $_GET['id'];
            $consumption = $daoFactory->getCustomerDAO()->load($_SESSION['customer']);
            ?>
            <table width="107%" class="adminlist">
                <tbody>
                    <tr class="row1">
                        <td width="38%"><label for="names"> Names : </label></td>
                        <td width="62%"><input type="text" name="names" size="40" maxlength="120" value="<?php echo $consumption->names; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="idNumber"> ID Number : </label></td>
                        <td width="62%"><input type="text" name="idNumber" size="40" maxlength="120" value="<?php echo $consumption->idNumber; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="emailAddress"> Email Address: </label></td>
                        <td width="62%"><input type="text" name="emailAddress" size="40" maxlength="120" value="<?php echo $consumption->emailAddress; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="phoneNumber"> Phone Number: </label></td>
                        <td width="62%"><input type="text" name="phoneNumber" size="40" maxlength="120" value="<?php echo $consumption->phoneNumber; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="accountNumber"> Account Number: </label></td>
                        <td width="62%"><input type="text" name="accountNumber" size="40" maxlength="120" value="<?php echo $consumption->accountNumber; ?>"/></td>
                    </tr>
                    <tr class="row1">
                        <td width="38%"><label for="bank"> Bank: </label></td>
                        <td width="62%"><input type="text" name="bank" size="40" maxlength="120" value="<?php echo $consumption->bank; ?>"/></td>
                    </tr>

                    <tr class="row1">
                        <td><label for=contractFrom> Contract From: </label></td>
                        <td><span id="multi"><input type="text" name="dateFrom" id="dateDefault1" size="10" readonly="readonly" value="<?php echo $consumption->contractFrom; ?>"/></span></td>
                    </tr>
                    <tr class="row1">
                        <td><label for=contractTo> Contract To: </label></td>
                        <td><span id="multi"><input type="text" name="dateTo" id="dateDefault2" size="10" readonly="readonly"  value="<?php echo $consumption->contractTo; ?>"/></span></td>
                    </tr>

                    <tr class="row1">
                        <td width="38%"><label for="maxmumAmount"> Maximum Amount: </label></td>
                        <td width="62%"><input type="text" name="maxmumAmount" size="40" maxlength="120" value="<?php echo $consumption->maxmumAmount; ?>"/></td>

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

    $consumption->names = $_POST['names'];
    $consumption->idNumber = $_POST['idNumber'];
    $consumption->emailAddress = $_POST['emailAddress'];
    $consumption->phoneNumber = $_POST['phoneNumber'];
    $consumption->accountNumber = $_POST['accountNumber'];
    $consumption->bank = $_POST['bank'];
    $consumption->contractFrom = $_POST['dateFrom'];
    $consumption->contractTo = $_POST['dateTo'];
    $consumption->maxmumAmount = ($_POST['maxmumAmount']);

    $daoFactory->getCustomerDAO()->update($consumption);
    
    header('location:index.php');
}
?>
<div class="clr"></div>


<?php include '../include/bottom.php'
?>