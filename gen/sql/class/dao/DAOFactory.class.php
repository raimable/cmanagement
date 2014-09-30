<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AnswerDAO
	 */
	public static function getAnswerDAO(){
		return new AnswerMySqlExtDAO();
	}

	/**
	 * @return ClusterDAO
	 */
	public static function getClusterDAO(){
		return new ClusterMySqlExtDAO();
	}

	/**
	 * @return InstitutionDAO
	 */
	public static function getInstitutionDAO(){
		return new InstitutionMySqlExtDAO();
	}

	/**
	 * @return QuestionDAO
	 */
	public static function getQuestionDAO(){
		return new QuestionMySqlExtDAO();
	}

	/**
	 * @return UserDAO
	 */
	public static function getUserDAO(){
		return new UserMySqlExtDAO();
	}


}
?>