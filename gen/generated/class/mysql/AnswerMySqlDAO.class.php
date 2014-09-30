<?php
/**
 * Class that operate on table 'answer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 20:03
 */
class AnswerMySqlDAO implements AnswerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnswerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM answer WHERE answerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM answer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM answer ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param answer primary key
 	 */
	public function delete($answerId){
		$sql = 'DELETE FROM answer WHERE answerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($answerId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnswerMySql answer
 	 */
	public function insert($answer){
		$sql = 'INSERT INTO answer (questionId, userId, description, date) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($answer->questionId);
		$sqlQuery->setNumber($answer->userId);
		$sqlQuery->set($answer->description);
		$sqlQuery->set($answer->date);

		$id = $this->executeInsert($sqlQuery);	
		$answer->answerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnswerMySql answer
 	 */
	public function update($answer){
		$sql = 'UPDATE answer SET questionId = ?, userId = ?, description = ?, date = ? WHERE answerId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($answer->questionId);
		$sqlQuery->setNumber($answer->userId);
		$sqlQuery->set($answer->description);
		$sqlQuery->set($answer->date);

		$sqlQuery->setNumber($answer->answerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM answer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByQuestionId($value){
		$sql = 'SELECT * FROM answer WHERE questionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM answer WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM answer WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM answer WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByQuestionId($value){
		$sql = 'DELETE FROM answer WHERE questionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserId($value){
		$sql = 'DELETE FROM answer WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM answer WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM answer WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnswerMySql 
	 */
	protected function readRow($row){
		$answer = new Answer();
		
		$answer->answerId = $row['answerId'];
		$answer->questionId = $row['questionId'];
		$answer->userId = $row['userId'];
		$answer->description = $row['description'];
		$answer->date = $row['date'];

		return $answer;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return AnswerMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>