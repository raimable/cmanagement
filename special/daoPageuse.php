<?php

include '../../include_dao.php';
$daoFactory = new DAOFactory();
//Include the PS_Pagination class
include('../special/daoPagination.php');
echo 'The total number or Income' . count($daoFactory->getIncomeDAO()->queryAll()) . '<br /><hr />';

$pagination = new DAOPagination($daoFactory->getIncomeDAO()->queryAll(), 5);

echo 'Total number of Records : ' . $pagination->num_of_record . '<br />';
echo 'Pages to display : ' . $pagination->num_of_pages . '<br />';
echo 'Records per Page : ' . $pagination->record_per_page . '<br />';
$income = new Income();
$pagination->displayRecords($income, amount);
$pagination->displayLinks();
$pagination->displayPages();
?>

