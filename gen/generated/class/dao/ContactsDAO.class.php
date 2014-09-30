<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 20:03
 */
interface ContactsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Contacts 
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
 	 * @param contact primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Contacts contact
 	 */
	public function insert($contact);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Contacts contact
 	 */
	public function update($contact);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamesAddress($value);

	public function queryByEmail($value);


	public function deleteByNamesAddress($value);

	public function deleteByEmail($value);


}
?>