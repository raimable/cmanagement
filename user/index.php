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

<?php
if (!isset($_SESSION['query'])) {
    $_SESSION['query'] = serialize($daoFactory->getUserDAO()->queryAll());
    $_SESSION['view'] = serialize('All Users');
}
if (isset($_POST['btnFilterByKeyword'])) {
    $_SESSION['query'] = serialize($daoFactory->getUserDAO()->searchByKeyword($_POST['keyword']));
    $_SESSION['keyword'] = $_POST['keyword'];
    $_SESSION['view'] = serialize($_POST['keyword']);
}
?>
<!-- This form is for resetting the previously set querien -->
<form action="clear.php" mathod="POST" name="index"></form>
<legend>Users</legend>
<div id="element-box" align="center">
    <div class="com-main" align="center">
        <form id="adminForm" name="adminForm" method="post" action="" autocomplete="off">
            <fieldset id="filter-bar">
                <div class="filter-search fltlft" align="center">
                    &nbsp;<span id="">
                        <input type="text" name="keyword" id="keyword" size="20" />
                    </span>&nbsp;&nbsp;  <span>
                        <label for="from_date" class="filter-search-lbl">&nbsp; </label>
                    </span>
                    <input type="submit" name="btnFilterByKeyword" id="btnFilterbyKeyword" value="Filter by Keyword" />
                   <!-- <input type="button" onclick="printDiv('printableArea')" value="Print Report!" /> -->

                </div>
                <span style="float: right; font-weight: bold; font-size: 17px;">
                    <label for="filter_search" class="filter-search-lbl">Current View :&nbsp; <?php echo unserialize($_SESSION['view']); ?></label>
                </span>
            </fieldset>
        </form>
        <div class="clr"> </div>
<?php
//Check whether there are registered christian 
$customer_query = unserialize($_SESSION['query']);
if ($customer_query) {
    if (isset($_POST['action_display'])) {
        $_SESSION['action_display'] = $_POST['action_display'];
        $pagination = new DAOPagination($customer_query, $_SESSION['action_display']);
    } else {
        //Check the last selected number of category display
        if (isset($_SESSION['action_display'])) {
            $pagination = new DAOPagination($customer_query, $_SESSION['action_display']);
        } else {
            //if no selected number to display just use the default
            $pagination = new DAOPagination($customer_query, 10);

            //set the number of display in the session
            $_SESSION['action_display'] = 10;
        }
    }
    $role = new Role();
    $i = 0;
    $index = 1;
    ?>
            <form id="records" name="records" method="POST" action="">
                <table class="adminlist">
                    <thead>
                        <tr>
                            <th width="1%" class="left">
                                <a href="">Index</a></th>
                            <th width="10%" class="left">
                                <a href="">Names</a></th>
                            <th width="10%" class="left">
                                <a href="">Username</a></th>
                            <th width="10%" class="left">
                                <a href="">Role</a></th>
                        </tr>
                    </thead>
    <?php
    $start = 1;
    $j = 1;
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 1) {
            $start = 1;
        } else {
            $start = (($_GET['page'] - 1) * $pagination->record_per_page) + 1;
        }
    }
    foreach ($customer_query as $user) {
        if ($j >= $start && $j < $start + $pagination->record_per_page) {
            ?>
                            <tbody>
                                <tr class="row<?php
                if ($i % 2 == 0) {
                    echo '0';
                } else {
                    echo '1';
                }
            ?>">
                                    <td class="center">
                                    <?php echo $index; ?></td>
                                    <td class="normal"><a href="update.php?id=<?php echo $user->userId; ?>"><?php echo $user->names; ?></a></td>

                                    <td class="normal"><?php echo $user->username; ?></td>
                                    <td class="normal"><?php echo $daoFactory->getRoleDAO()->load($user->roleId)->roleName; ?></td>
                                
                                
                                </tr>

                            </tbody>
            <?php
        }
        $j++;
        $i++;
        $index++;
    }
    ?>
                </table>
            </form>
            <form method="POST" action="index.php">
                <table class="adminlist">
                    <tfoot>
                        <tr><td width="25%"><div class="left"><strong>Total Number Of records: <?php echo count($customer_query); ?></strong></div></td>
                            <td>
                                <div class="container"><div class="pagination">
                                        <div class="limit">Displaying #<select onChange="this.form.submit();" name="action_display">
    <?php
    echo '<option value="' . count($customer_query) . '" selected="true">All</option>';
    for ($k = 5; $k <= 50; $k = $k + 5) {
        if ($k == $_SESSION['action_display']) {
            echo '<option value="' . $k . '" selected="true">' . $k . '</option>';
        } else {
            echo '<option value="' . $k . '">' . $k . '</option>';
        }
    }
    ?>
                                            </select>
                                        </div><?php $pagination->displayLinks();
                                            $pagination->displayPages();
                                            ?>
                                        <input type="hidden" value="0" name="limitstart">
                                    </div></div>				</td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            <?php
        } else {
            echo 'No record exist!';
        }
        ?>

        <div>
            </form>

            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
</div>


<?php include '../include/bottom.php' ?>