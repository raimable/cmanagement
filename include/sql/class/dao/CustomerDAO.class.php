<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
interface CustomerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Customer 
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
 	 * @param customer primary key
 	 */
	public function delete($customerId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Customer customer
 	 */
	public function insert($customer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Customer customer
 	 */
	public function update($customer);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNames($value);

	public function queryByIdNumber($value);

	public function queryByEmailAddress($value);

	public function queryByPhoneNumber($value);

	public function queryByAccountNumber($value);

	public function queryByBank($value);

	public function queryByContractFrom($value);

	public function queryByContractTo($value);

	public function queryByMaxmumAmount($value);


	public function deleteByNames($value);

	public function deleteByIdNumber($value);

	public function deleteByEmailAddress($value);

	public function deleteByPhoneNumber($value);

	public function deleteByAccountNumber($value);

	public function deleteByBank($value);

	public function deleteByContractFrom($value);

	public function deleteByContractTo($value);

	public function deleteByMaxmumAmount($value);


}
?>