<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/ConsumptionDAO.class.php');
	require_once('class/dto/Consumption.class.php');
	require_once('class/mysql/ConsumptionMySqlDAO.class.php');
	require_once('class/mysql/ext/ConsumptionMySqlExtDAO.class.php');
	require_once('class/dao/CustomerDAO.class.php');
	require_once('class/dto/Customer.class.php');
	require_once('class/mysql/CustomerMySqlDAO.class.php');
	require_once('class/mysql/ext/CustomerMySqlExtDAO.class.php');
	require_once('class/dao/PartnerDAO.class.php');
	require_once('class/dto/Partner.class.php');
	require_once('class/mysql/PartnerMySqlDAO.class.php');
	require_once('class/mysql/ext/PartnerMySqlExtDAO.class.php');
	require_once('class/dao/RoleDAO.class.php');
	require_once('class/dto/Role.class.php');
	require_once('class/mysql/RoleMySqlDAO.class.php');
	require_once('class/mysql/ext/RoleMySqlExtDAO.class.php');
	require_once('class/dao/ServiceDAO.class.php');
	require_once('class/dto/Service.class.php');
	require_once('class/mysql/ServiceMySqlDAO.class.php');
	require_once('class/mysql/ext/ServiceMySqlExtDAO.class.php');
	require_once('class/dao/UserDAO.class.php');
	require_once('class/dto/User.class.php');
	require_once('class/mysql/UserMySqlDAO.class.php');
	require_once('class/mysql/ext/UserMySqlExtDAO.class.php');

?>