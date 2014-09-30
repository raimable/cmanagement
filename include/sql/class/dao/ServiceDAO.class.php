<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
interface ServiceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Service 
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
 	 * @param service primary key
 	 */
	public function delete($serviceId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Service service
 	 */
	public function insert($service);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Service service
 	 */
	public function update($service);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByServiceDescription($value);


	public function deleteByServiceDescription($value);


}
?>