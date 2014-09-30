<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
interface PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Partner 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param partner primary key
 	 */
	public function delete($partnerId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Partner partner
 	 */
	public function insert($partner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Partner partner
 	 */
	public function update($partner);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPartnerName($value);

	public function queryByBankAccount($value);

	public function queryByBankAcoountProvider($value);

	public function queryByServiceId($value);


	public function deleteByPartnerName($value);

	public function deleteByBankAccount($value);

	public function deleteByBankAcoountProvider($value);

	public function deleteByServiceId($value);


}
?>