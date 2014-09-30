<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 19:50
 */
interface ClusterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cluster 
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
 	 * @param cluster primary key
 	 */
	public function delete($clusterId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cluster cluster
 	 */
	public function insert($cluster);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cluster cluster
 	 */
	public function update($cluster);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByClusterName($value);


	public function deleteByClusterName($value);


}
?>