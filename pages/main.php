<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OTP Social Activities</title>
</head>

<body>
<?php 
	include '../include/header.php';
	//include '../include/sql/include_dao.php';
        
        //$daoFactory = new DAOFactory();
        
        
        $ref = strtotime("2012-07-28");
        $now = time();        
        
        $diff = $now - $ref;
        echo floor($diff/(60*60*24));
        //printf("%d Years, %d Month,%d days",$diff->Y,$diff->m,$diff->d);
?>
</body>
</html>