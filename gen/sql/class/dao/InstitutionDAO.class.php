<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 19:50
 */
interface InstitutionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Institution 
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
 	 * @param institution primary key
 	 */
	public function delete($institutionId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Institution institution
 	 */
	public function insert($institution);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Institution institution
 	 */
	public function update($institution);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmail($value);

	public function queryByInstitutionAcronym($value);

	public function queryByIntitutionName($value);

	public function queryByClusterId($value);


	public function deleteByEmail($value);

	public function deleteByInstitutionAcronym($value);

	public function deleteByIntitutionName($value);

	public function deleteByClusterId($value);


}
?>