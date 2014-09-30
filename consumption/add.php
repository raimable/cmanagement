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
<div class="pagetitle icon-48-article">
    <h2>Recording the Consumption for: <?php echo $daoFactory->getCustomerDAO()->load($_GET['id'])->names; ?></h2></div>
<div class="pagetitle icon-48-article">
    <h3> <a href="customerConsuptions.php?id=<?php echo $_GET['id']; ?>">Click Here to view detailed consumption </a>
    </h3>
</div>
<?php
//if (isset($_SESSION['error_message'])) {
//    echo $_SESSION['error_message'];
//    unset($_SESSION['error_message']);
//}
//if (isset($_SESSION['op_message'])) {
//    echo $_SESSION['op_message'];
//    unset($_SESSION['op_message']);
//}
$userAmount = 0;
foreach ($daoFactory->getConsumptionDAO()->queryByCustomerId($_GET['id']) as $consumption1) {
$userAmount += $consumption1->amount;
}
?>

<div class="width-70 fltlft">
    <fieldset class="adminform">
        <form name="update_form" method="POST" id="item-form" class="form-validate">

            <table class="adminlist">
                <tbody>

                    <tr class="row1">
                        <td width="43%"><strong>Select service</strong></td>
                        <td width="57%"><select name="lstService" id="lstService" onchange="window.open(this.options[this.selectedIndex].value, '_top')">
                                <option value="">--Select service--</option>   
                                <?php
                                foreach ($daoFactory->getServiceDAO()->queryAll() as $service) {
                                    ?>
                                    <option value="?serviceId=<?php echo $service->serviceId;?>&id=<?php echo $_GET['id']?>"><?php echo $service->serviceDescription; ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>

                    <tr class="row1">
                        <td width="43%"><strong>Partner</strong></td>
                        <td width="57%"><select name="lstPartner" id="lstPartner">
                                <option value="">--Select partner--</option>  
                                <?php
                                if (isset($_GET['serviceId'])) {

                                    foreach ($daoFactory->getPartnerDAO()->queryByServiceId($_GET['serviceId']) as $partner) {
                                        ?>
                                        <option value="<?php echo $partner->partnerId; ?>"><?php echo $partner->partnerName; ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select></td>
                    </tr> 


                    <tr class="row1">
                        <td width="38%"><label for="amount"> Amount: </label></td>
                        <td width="62%"><input type="text" name="amount" size="40" maxlength="120"/></td>
                    </tr>


                    <tr class="row1">
                        <td><label for=date> From: </label></td>
                        <td><span id="multi"><input type="text" name="from" value="<?php echo date('Y-m-d') ?>" id="dateDefault1" size="10" readonly="readonly" /></span></td>
                    </tr>
                    <tr class="row1">
                        <td><label for=date> To: </label></td>
                        <td><span id="multi"><input type="text" name="to" id="dateDefault2" size="10" readonly="readonly" value="<?php echo date('Y-m-d'); ?>"/></span></td>
                    </tr>




                    <tr class="row1">

                        <td align="center"><input type="reset" name="clear" value="Clear form" /></td>
                        <td align="center">
                            <input type="submit" name="save" id="save" value="Save Consumption" /></td>
                    </tr>


                </tbody>
            </table>
        </form>

    </fieldset>

</div>
<?php
if (isset($_POST['save'])) {
    $consumption = new Consumption();
    $consumption->recordedOn = date('Y-m-d');
    $consumption->customerId = $_GET['id'];
    $consumption->amount = $_POST['amount'];
    $consumption->contractFrom = $_POST['from'];
    $consumption->contractTo = $_POST['to'];
    $consumption->partnerId = $_POST['lstPartner'];

    $daoFactory->getConsumptionDAO()->insert($consumption);
}
?>
<div class="clr"></div>


<?php include '../include/bottom.php' ?>