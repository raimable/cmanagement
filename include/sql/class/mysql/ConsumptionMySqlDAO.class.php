<?php
/**
 * Class that operate on table 'consumption'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-25 10:01
 */
class ConsumptionMySqlDAO implements ConsumptionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ConsumptionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM consumption WHERE consumptionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM consumption';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM consumption ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param consumption primary key
 	 */
	public function delete($consumptionId){
		$sql = 'DELETE FROM consumption WHERE consumptionId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($consumptionId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsumptionMySql consumption
 	 */
	public function insert($consumption){
		$sql = 'INSERT INTO consumption (recordedOn, customerId, amount, contractFrom, contractTo, partnerId) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($consumption->recordedOn);
		$sqlQuery->setNumber($consumption->customerId);
		$sqlQuery->set($consumption->amount);
		$sqlQuery->set($consumption->contractFrom);
		$sqlQuery->set($consumption->contractTo);
		$sqlQuery->setNumber($consumption->partnerId);

		$id = $this->executeInsert($sqlQuery);	
		$consumption->consumptionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsumptionMySql consumption
 	 */
	public function update($consumption){
		$sql = 'UPDATE consumption SET recordedOn = ?, customerId = ?, amount = ?, contractFrom = ?, contractTo = ?, partnerId = ? WHERE consumptionId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($consumption->recordedOn);
		$sqlQuery->setNumber($consumption->customerId);
		$sqlQuery->set($consumption->amount);
		$sqlQuery->set($consumption->contractFrom);
		$sqlQuery->set($consumption->contractTo);
		$sqlQuery->setNumber($consumption->partnerId);

		$sqlQuery->setNumber($consumption->consumptionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM consumption';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRecordedOn($value){
		$sql = 'SELECT * FROM consumption WHERE recordedOn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustomerId($value){
		$sql = 'SELECT * FROM consumption WHERE customerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmount($value){
		$sql = 'SELECT * FROM consumption WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContractFrom($value){
		$sql = 'SELECT * FROM consumption WHERE contractFrom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContractTo($value){
		$sql = 'SELECT * FROM consumption WHERE contractTo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartnerId($value){
		$sql = 'SELECT * FROM consumption WHERE partnerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRecordedOn($value){
		$sql = 'DELETE FROM consumption WHERE recordedOn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustomerId($value){
		$sql = 'DELETE FROM consumption WHERE customerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmount($value){
		$sql = 'DELETE FROM consumption WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContractFrom($value){
		$sql = 'DELETE FROM consumption WHERE contractFrom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContractTo($value){
		$sql = 'DELETE FROM consumption WHERE contractTo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartnerId($value){
		$sql = 'DELETE FROM consumption WHERE partnerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ConsumptionMySql 
	 */
	protected function readRow($row){
		$consumption = new Consumption();
		
		$consumption->consumptionId = $row['consumptionId'];
		$consumption->recordedOn = $row['recordedOn'];
		$consumption->customerId = $row['customerId'];
		$consumption->amount = $row['amount'];
		$consumption->contractFrom = $row['contractFrom'];
		$consumption->contractTo = $row['contractTo'];
		$consumption->partnerId = $row['partnerId'];

		return $consumption;
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
	 * @return ConsumptionMySql 
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