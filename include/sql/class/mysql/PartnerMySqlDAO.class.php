<?php
/**
 * Class that operate on table 'partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
class PartnerMySqlDAO implements PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PartnerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM partner WHERE partnerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM partner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param partner primary key
 	 */
	public function delete($partnerId){
		$sql = 'DELETE FROM partner WHERE partnerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($partnerId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function insert($partner){
		$sql = 'INSERT INTO partner (partnerName, bankAccount, bankAcoountProvider, serviceId) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->partnerName);
		$sqlQuery->set($partner->bankAccount);
		$sqlQuery->set($partner->bankAcoountProvider);
		$sqlQuery->setNumber($partner->serviceId);

		$id = $this->executeInsert($sqlQuery);	
		$partner->partnerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function update($partner){
		$sql = 'UPDATE partner SET partnerName = ?, bankAccount = ?, bankAcoountProvider = ?, serviceId = ? WHERE partnerId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->partnerName);
		$sqlQuery->set($partner->bankAccount);
		$sqlQuery->set($partner->bankAcoountProvider);
		$sqlQuery->setNumber($partner->serviceId);

		$sqlQuery->setNumber($partner->partnerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPartnerName($value){
		$sql = 'SELECT * FROM partner WHERE partnerName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBankAccount($value){
		$sql = 'SELECT * FROM partner WHERE bankAccount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBankAcoountProvider($value){
		$sql = 'SELECT * FROM partner WHERE bankAcoountProvider = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByServiceId($value){
		$sql = 'SELECT * FROM partner WHERE serviceId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPartnerName($value){
		$sql = 'DELETE FROM partner WHERE partnerName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankAccount($value){
		$sql = 'DELETE FROM partner WHERE bankAccount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankAcoountProvider($value){
		$sql = 'DELETE FROM partner WHERE bankAcoountProvider = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByServiceId($value){
		$sql = 'DELETE FROM partner WHERE serviceId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PartnerMySql 
	 */
	protected function readRow($row){
		$partner = new Partner();
		
		$partner->partnerId = $row['partnerId'];
		$partner->partnerName = $row['partnerName'];
		$partner->bankAccount = $row['bankAccount'];
		$partner->bankAcoountProvider = $row['bankAcoountProvider'];
		$partner->serviceId = $row['serviceId'];

		return $partner;
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
	 * @return PartnerMySql 
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