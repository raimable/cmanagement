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
                    <h2>Petition Update</h2></div>
               

                <div class="width-60 fltlft">
                    <fieldset class="adminform">

                        <form name="update_form" method="POST" id="item-form" class="form-validate">
                            <?php
                            $_SESSION['petition'] = $_GET['id'];
                            $petition = $daoFactory->getPetitionsDAO()->load($_SESSION['petition']);
                            ?>

                            <table width="36%" class="adminlist">
                                <tbody>


                                    <tr class="row1">
                                        <td colspan="2"><label for="fullName"> <strong>Names</strong> : <?php echo $petition->name;
                            ?></label>
                                            <label for="date"> <strong>Date: <?php echo $petition->date; ?></strong></label>
                                            <label for="address"> <strong>District: </strong><?php echo $petition->district . ". " ?></label>
                                            <label for="address"> <strong> Phone Number:</strong><?php echo $petition->phoneNumber; ?></label>
                                            <label for="category"> <strong>Petition Category:</strong><?php echo $petition->petitionType; ?></label>
                                            <label for="phone">  <strong>Petition Description:</strong><?php echo $petition->petitionDescription; ?></label>
                                            <label for="phone">  <strong>Petition Resolution:</strong><?php echo $daoFactory->getResolutionDAO()->queryByPetitionRegNumber($petition->regNumber)->resolutionDetails; ?></label>
                                        </td>
                                    </tr>        


                                    <tr class="row1">
                                        <td><strong>Update Status</strong></td>
                                        <td>
                                            <select name="lstStatus" id="lstStatus">
                                                <option value="">--Select Status--</option>
                                                <option value="Solved">Solved</option>
                                                <option value="Oriented-Ongoing">Oriented-Ongoing</option>
                                                <option value="Oriented-Not Started">Oriented-Not Started</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="row1">
                                        <td width="43%"><strong>Petition Resolution</strong>: </td>
                                        <td width="57%">
                                            <textarea name="resolution" id="resolution" cols="45" rows="5"></textarea>
                                        </td>
                                    </tr>
                                    <tr class="row1">

                                        <td align="center"><input type="reset" name="clear" value="Clear form" /></td>
                                        <td align="center">
                                            <input type="submit" name="update" id="update" value="Save all Changes" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>


                    </fieldset>

                </div>
                <?php
                if (isset($_POST['update'])) {
                    $petition = $daoFactory->getPetitionsDAO()->load($_SESSION['petition']);

                    $petition->petitionStatus = $_POST['lstStatus'];
                    if ($daoFactory->getResolutionDAO()->queryByPetitionRegNumber($petition->regNumber)) {
                        $resolution = $daoFactory->getResolutionDAO()->queryByPetitionRegNumber($petition->regNumber);
                        $resolution->date = date('Y-m-d');
                        $resolution->resolutionDetails = $resolution->resolutionDetails.'<br/><strong> '.date('Y-m-d'). '</strong>:  '.$_POST['resolution'];
                        $daoFactory->getResolutionDAO()->update($resolution);
                    } else {
                        $resolution->petitionRegNumber = $petition->regNumber;
                        $resolution->date = date('Y-m-d');
                        $resolution->resolutionDetails = $_POST['resolution'];
                        $daoFactory->getResolutionDAO()->insert($resolution);
                    }
                    $daoFactory->getPetitionsDAO()->update($petition);
                    header('location:index.php');
                }
                ?>
                <div class="clr"></div>


<?php include '../include/bottom.php'
?>