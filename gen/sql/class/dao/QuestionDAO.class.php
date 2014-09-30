<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 19:50
 */
interface QuestionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Question 
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
 	 * @param question primary key
 	 */
	public function delete($questionId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Question question
 	 */
	public function insert($question);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Question question
 	 */
	public function update($question);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNames($value);

	public function queryByCountry($value);

	public function queryByCity($value);

	public function queryByEmail($value);

	public function queryByTargetedCluster($value);

	public function queryByTargetedInstitution($value);

	public function queryByAddress($value);

	public function queryByDate($value);

	public function queryBySubject($value);

	public function queryByQuestionDescription($value);

	public function queryByStatus($value);


	public function deleteByNames($value);

	public function deleteByCountry($value);

	public function deleteByCity($value);

	public function deleteByEmail($value);

	public function deleteByTargetedCluster($value);

	public function deleteByTargetedInstitution($value);

	public function deleteByAddress($value);

	public function deleteByDate($value);

	public function deleteBySubject($value);

	public function deleteByQuestionDescription($value);

	public function deleteByStatus($value);


}
?>