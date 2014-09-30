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
 	
	require_once('class/dao/AnswerDAO.class.php');
	require_once('class/dto/Answer.class.php');
	require_once('class/mysql/AnswerMySqlDAO.class.php');
	require_once('class/mysql/ext/AnswerMySqlExtDAO.class.php');
	require_once('class/dao/ClusterDAO.class.php');
	require_once('class/dto/Cluster.class.php');
	require_once('class/mysql/ClusterMySqlDAO.class.php');
	require_once('class/mysql/ext/ClusterMySqlExtDAO.class.php');
	require_once('class/dao/ContactsDAO.class.php');
	require_once('class/dto/Contact.class.php');
	require_once('class/mysql/ContactsMySqlDAO.class.php');
	require_once('class/mysql/ext/ContactsMySqlExtDAO.class.php');
	require_once('class/dao/InstitutionDAO.class.php');
	require_once('class/dto/Institution.class.php');
	require_once('class/mysql/InstitutionMySqlDAO.class.php');
	require_once('class/mysql/ext/InstitutionMySqlExtDAO.class.php');
	require_once('class/dao/QuestionDAO.class.php');
	require_once('class/dto/Question.class.php');
	require_once('class/mysql/QuestionMySqlDAO.class.php');
	require_once('class/mysql/ext/QuestionMySqlExtDAO.class.php');
	require_once('class/dao/UserDAO.class.php');
	require_once('class/dto/User.class.php');
	require_once('class/mysql/UserMySqlDAO.class.php');
	require_once('class/mysql/ext/UserMySqlExtDAO.class.php');

?>