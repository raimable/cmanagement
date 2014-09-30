<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-25 10:01
 */
interface ConsumptionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Consumption 
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
 	 * @param consumption primary key
 	 */
	public function delete($consumptionId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Consumption consumption
 	 */
	public function insert($consumption);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Consumption consumption
 	 */
	public function update($consumption);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRecordedOn($value);

	public function queryByCustomerId($value);

	public function queryByAmount($value);

	public function queryByContractFrom($value);

	public function queryByContractTo($value);

	public function queryByPartnerId($value);


	public function deleteByRecordedOn($value);

	public function deleteByCustomerId($value);

	public function deleteByAmount($value);

	public function deleteByContractFrom($value);

	public function deleteByContractTo($value);

	public function deleteByPartnerId($value);


}
?>