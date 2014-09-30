<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 19:50
 */
interface AnswerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Answer 
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
 	 * @param answer primary key
 	 */
	public function delete($answerId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Answer answer
 	 */
	public function insert($answer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Answer answer
 	 */
	public function update($answer);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByQuestionId($value);

	public function queryByUserId($value);

	public function queryByDescription($value);

	public function queryByDate($value);


	public function deleteByQuestionId($value);

	public function deleteByUserId($value);

	public function deleteByDescription($value);

	public function deleteByDate($value);


}
?>