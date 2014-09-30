<?php
include '../../include_dao.php';
$daoFactory = new DAOFactory();

echo 'The total number or Income' . count($daoFactory->getIncomeDAO()->queryAll());

if (count($daoFactory->getIncomeDAO()->queryAll())) {
    $records = $daoFactory->getIncomeDAO()->queryAll();
    $num_of_record = count($daoFactory->getIncomeDAO()->queryAll());
    $recperpage = 5;
    $pages = ceil($num_of_record / $recperpage);
}
?>
<hr />
<?php
$income = new Income();
$start = 1;
$j = 1;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 1) {
        $start = 1;
    } else {
        $start = ($_GET['page'] - 1) * $recperpage;
    }
}

foreach ($records as $income) {
    if ($j >= $start && $j < $start + $recperpage) {
        echo $income->amount . '<br />';
    }
    $j++;
}
?>
<hr />
<?php
echo 'First ';
for ($i = 1; $i <= $pages; $i++) {
    if ($i != $_GET['page']) {
        echo ' <a href="?page=' . $i . '">' . $i . '</a> ';
    } else {
        echo ' ' . $i . ' ';
    }
}

if (isset($_GET['page'])) {
    echo ' page ' . $_GET['page'] . ' of ' . $pages;
} else {
    echo ' page 1 of ' . $pages;
}
?>