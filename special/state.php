<?

include '../../include_dao.php';
$daoFactory = new DAOFactory();
$sector = new Sector();
$cell = new Cell();
$village = new Village();

$level = $_GET['level'];
switch ($level) {
    case 1: {
            $district_id = $_GET['district_id'];
            $myarray = array();
            $str = "";
            foreach ($daoFactory->getSectorDAO()->queryByDistrictId($district_id) as $sector) {
                $str = $str . "\"" . $sector->id . "\"" . "," . "\"" . $sector->sName . "\"" . ",";
            }
            $str = substr($str, 0, (strLen($str) - 1)); // Removing the last char , from the string
            echo "new Array($str)";
        }
        break;
    case 2: {
            $sector_id = $_GET['sector_id'];
            $myarray = array();
            $str = "";
            foreach ($daoFactory->getCellDAO()->queryBySectorId($sector_id) as $cell) {
                $str = $str . "\"" . $cell->id . "\"" . "," . "\"" . $cell->cName . "\"" . ",";
            }
            $str = substr($str, 0, (strLen($str) - 1)); // Removing the last char , from the string
            echo "new Array($str)";
        }
        break;
    case 3: {
            $cell_id = $_GET['cell_id'];
            $myarray = array();
            $str = "";
            foreach ($daoFactory->getVillageDAO()->queryByCellId($cell_id) as $village) {
                $str = $str . "\"" . $village->id . "\"" . "," . "\"" . $village->vName . "\"" . ",";
            }
            $str = substr($str, 0, (strLen($str) - 1)); // Removing the last char , from the string
            echo "new Array($str)";
        }
        break;
}
?>