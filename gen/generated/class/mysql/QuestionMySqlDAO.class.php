<?php
/**
 * Class that operate on table 'question'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 20:03
 */
class QuestionMySqlDAO implements QuestionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return QuestionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM question WHERE questionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM question';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM question ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param question primary key
 	 */
	public function delete($questionId){
		$sql = 'DELETE FROM question WHERE questionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($questionId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param QuestionMySql question
 	 */
	public function insert($question){
		$sql = 'INSERT INTO question (names, country, city, email, targetedCluster, targetedInstitution, address, date, subject, questionDescription, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($question->names);
		$sqlQuery->set($question->country);
		$sqlQuery->set($question->city);
		$sqlQuery->set($question->email);
		$sqlQuery->setNumber($question->targetedCluster);
		$sqlQuery->setNumber($question->targetedInstitution);
		$sqlQuery->set($question->address);
		$sqlQuery->set($question->date);
		$sqlQuery->set($question->subject);
		$sqlQuery->set($question->questionDescription);
		$sqlQuery->set($question->status);

		$id = $this->executeInsert($sqlQuery);	
		$question->questionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param QuestionMySql question
 	 */
	public function update($question){
		$sql = 'UPDATE question SET names = ?, country = ?, city = ?, email = ?, targetedCluster = ?, targetedInstitution = ?, address = ?, date = ?, subject = ?, questionDescription = ?, status = ? WHERE questionId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($question->names);
		$sqlQuery->set($question->country);
		$sqlQuery->set($question->city);
		$sqlQuery->set($question->email);
		$sqlQuery->setNumber($question->targetedCluster);
		$sqlQuery->setNumber($question->targetedInstitution);
		$sqlQuery->set($question->address);
		$sqlQuery->set($question->date);
		$sqlQuery->set($question->subject);
		$sqlQuery->set($question->questionDescription);
		$sqlQuery->set($question->status);

		$sqlQuery->setNumber($question->questionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM question';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNames($value){
		$sql = 'SELECT * FROM question WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCountry($value){
		$sql = 'SELECT * FROM question WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM question WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM question WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTargetedCluster($value){
		$sql = 'SELECT * FROM question WHERE targetedCluster = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTargetedInstitution($value){
		$sql = 'SELECT * FROM question WHERE targetedInstitution = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM question WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM question WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubject($value){
		$sql = 'SELECT * FROM question WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuestionDescription($value){
		$sql = 'SELECT * FROM question WHERE questionDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM question WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNames($value){
		$sql = 'DELETE FROM question WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCountry($value){
		$sql = 'DELETE FROM question WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM question WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM question WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTargetedCluster($value){
		$sql = 'DELETE FROM question WHERE targetedCluster = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTargetedInstitution($value){
		$sql = 'DELETE FROM question WHERE targetedInstitution = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM question WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM question WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubject($value){
		$sql = 'DELETE FROM question WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuestionDescription($value){
		$sql = 'DELETE FROM question WHERE questionDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM question WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return QuestionMySql 
	 */
	protected function readRow($row){
		$question = new Question();
		
		$question->questionId = $row['questionId'];
		$question->names = $row['names'];
		$question->country = $row['country'];
		$question->city = $row['city'];
		$question->email = $row['email'];
		$question->targetedCluster = $row['targetedCluster'];
		$question->targetedInstitution = $row['targetedInstitution'];
		$question->address = $row['address'];
		$question->date = $row['date'];
		$question->subject = $row['subject'];
		$question->questionDescription = $row['questionDescription'];
		$question->status = $row['status'];

		return $question;
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
	 * @return QuestionMySql 
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