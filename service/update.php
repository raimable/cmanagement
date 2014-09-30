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
<div class="pagetitle icon-48-article"><h2>Action Manager</h2></div>
<?php
if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
</div>
</div>
<?php
if (isset($_GET['act'])) {
    if ($daoFactory->getActionsDAO()->load($_GET['act'])) {
        $action = $daoFactory->getActionsDAO()->load($_GET['act']);
        ?>
        <div class="width-60 fltlft">
            <fieldset class="adminform">
                <legend>Action Modification</legend>
                <form name="update_form" method="POST" id="item-form" class="form-validate" action="process.php?action=2&amp;act=<?php echo $_GET['act']; ?>">
                    <table class="adminlist">
                        <tbody>
                            <tr class="row1" >
                                <td><label for="action"> Action Name :</label></td>
                                <td><input type="text" name="action" size="20" value="<?php echo $action->title; ?>" /></td>
                            </tr>
                            <tr class="row1">
                                <td><label for="created_on"> Created On :</label></td>
                                <td>
                                    <div id="multi">
                                <input type="text" name="created_on" size="10" value="<?php echo $action->createdOn; ?>" readonly="readonly" />
                                <button type="button">DATE</button>
                                <br/>
                            </div></td>
                            </tr>
                            <tr class="row1">
                                <td><label for="description"> Action description :</label></td>
                                <td><textarea row="50" cols="50" name="description"><?php echo $action->description; ?></textarea></td>
                            </tr>
                        <tr class="row1">
                            <td><label for="scheduled_on"> Schedule On :</label></td>
                            <td><input type="text" name="scheduled_on" id="dateTimeCustom" value="<?php echo $action->scheduleOn; ?>" readonly="readonly" />
                            <button type="button">Date & Time</button></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </fieldset>
        </div>
        <?php
    } else {
        echo 'Invalid Action!';
    }
}
?>
<div class="clr"></div>
</div>
</div>
<?php include '../include/bottom.php' ?>