<?php
/**
 * Class that operate on table 'institution'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 20:03
 */
class InstitutionMySqlDAO implements InstitutionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InstitutionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM institution WHERE institutionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM institution';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM institution ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param institution primary key
 	 */
	public function delete($institutionId){
		$sql = 'DELETE FROM institution WHERE institutionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($institutionId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InstitutionMySql institution
 	 */
	public function insert($institution){
		$sql = 'INSERT INTO institution (email, institutionAcronym, IntitutionName, clusterId) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($institution->email);
		$sqlQuery->set($institution->institutionAcronym);
		$sqlQuery->set($institution->intitutionName);
		$sqlQuery->setNumber($institution->clusterId);

		$id = $this->executeInsert($sqlQuery);	
		$institution->institutionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InstitutionMySql institution
 	 */
	public function update($institution){
		$sql = 'UPDATE institution SET email = ?, institutionAcronym = ?, IntitutionName = ?, clusterId = ? WHERE institutionId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($institution->email);
		$sqlQuery->set($institution->institutionAcronym);
		$sqlQuery->set($institution->intitutionName);
		$sqlQuery->setNumber($institution->clusterId);

		$sqlQuery->setNumber($institution->institutionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM institution';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM institution WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInstitutionAcronym($value){
		$sql = 'SELECT * FROM institution WHERE institutionAcronym = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIntitutionName($value){
		$sql = 'SELECT * FROM institution WHERE IntitutionName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClusterId($value){
		$sql = 'SELECT * FROM institution WHERE clusterId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmail($value){
		$sql = 'DELETE FROM institution WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInstitutionAcronym($value){
		$sql = 'DELETE FROM institution WHERE institutionAcronym = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIntitutionName($value){
		$sql = 'DELETE FROM institution WHERE IntitutionName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClusterId($value){
		$sql = 'DELETE FROM institution WHERE clusterId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InstitutionMySql 
	 */
	protected function readRow($row){
		$institution = new Institution();
		
		$institution->institutionId = $row['institutionId'];
		$institution->email = $row['email'];
		$institution->institutionAcronym = $row['institutionAcronym'];
		$institution->intitutionName = $row['IntitutionName'];
		$institution->clusterId = $row['clusterId'];

		return $institution;
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
	 * @return InstitutionMySql 
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