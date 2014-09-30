<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return ConsumptionDAO
	 */
	public static function getConsumptionDAO(){
		return new ConsumptionMySqlExtDAO();
	}

	/**
	 * @return CustomerDAO
	 */
	public static function getCustomerDAO(){
		return new CustomerMySqlExtDAO();
	}

	/**
	 * @return PartnerDAO
	 */
	public static function getPartnerDAO(){
		return new PartnerMySqlExtDAO();
	}

	/**
	 * @return RoleDAO
	 */
	public static function getRoleDAO(){
		return new RoleMySqlExtDAO();
	}

	/**
	 * @return ServiceDAO
	 */
	public static function getServiceDAO(){
		return new ServiceMySqlExtDAO();
	}

	/**
	 * @return UserDAO
	 */
	public static function getUserDAO(){
		return new UserMySqlExtDAO();
	}


}
?>