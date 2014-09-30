<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
interface RoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Role 
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
 	 * @param role primary key
 	 */
	public function delete($roleId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Role role
 	 */
	public function insert($role);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Role role
 	 */
	public function update($role);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRoleName($value);

	public function queryByRoleDescription($value);


	public function deleteByRoleName($value);

	public function deleteByRoleDescription($value);


}
?>