<?php
/**
 * Class that operate on table 'customer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
class CustomerMySqlDAO implements CustomerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CustomerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM customer WHERE customerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM customer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	public function queryAllWithValidContract(){
		$sql = 'SELECT * FROM customer WHERE contractTo > '.  date('Y-m-d');
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	public function queryAllWithInvalidContract(){
		$sql = 'SELECT * FROM customer WHERE contractTo < '.  date('Y-m-d');
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM customer ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param customer primary key
 	 */
	public function delete($customerId){
		$sql = 'DELETE FROM customer WHERE customerId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($customerId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CustomerMySql customer
 	 */
	public function insert($customer){
		$sql = 'INSERT INTO customer (names, idNumber, emailAddress, phoneNumber, accountNumber, bank, contractFrom, contractTo, maxmumAmount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($customer->names);
		$sqlQuery->set($customer->idNumber);
		$sqlQuery->set($customer->emailAddress);
		$sqlQuery->set($customer->phoneNumber);
		$sqlQuery->set($customer->accountNumber);
		$sqlQuery->set($customer->bank);
		$sqlQuery->set($customer->contractFrom);
		$sqlQuery->set($customer->contractTo);
		$sqlQuery->set($customer->maxmumAmount);

		$id = $this->executeInsert($sqlQuery);	
		$customer->customerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CustomerMySql customer
 	 */
	public function update($customer){
		$sql = 'UPDATE customer SET names = ?, idNumber = ?, emailAddress = ?, phoneNumber = ?, accountNumber = ?, bank = ?, contractFrom = ?, contractTo = ?, maxmumAmount = ? WHERE customerId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($customer->names);
		$sqlQuery->set($customer->idNumber);
		$sqlQuery->set($customer->emailAddress);
		$sqlQuery->set($customer->phoneNumber);
		$sqlQuery->set($customer->accountNumber);
		$sqlQuery->set($customer->bank);
		$sqlQuery->set($customer->contractFrom);
		$sqlQuery->set($customer->contractTo);
		$sqlQuery->set($customer->maxmumAmount);

		$sqlQuery->setNumber($customer->customerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM customer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNames($value){
		$sql = 'SELECT * FROM customer WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
        
          public function searchByKeyword($message){
		$sql = 'SELECT * FROM customer WHERE contractTo > '.date('Y-m-d').' AND names like \'%' . $message.'%\'';
		$sqlQuery = new SqlQuery($sql);
		
		
		return $this->getList($sqlQuery);
	}


	public function queryByIdNumber($value){
		$sql = 'SELECT * FROM customer WHERE idNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailAddress($value){
		$sql = 'SELECT * FROM customer WHERE emailAddress = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhoneNumber($value){
		$sql = 'SELECT * FROM customer WHERE phoneNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountNumber($value){
		$sql = 'SELECT * FROM customer WHERE accountNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBank($value){
		$sql = 'SELECT * FROM customer WHERE bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContractFrom($value){
		$sql = 'SELECT * FROM customer WHERE contractFrom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContractTo($value){
		$sql = 'SELECT * FROM customer WHERE contractTo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaxmumAmount($value){
		$sql = 'SELECT * FROM customer WHERE maxmumAmount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNames($value){
		$sql = 'DELETE FROM customer WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdNumber($value){
		$sql = 'DELETE FROM customer WHERE idNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailAddress($value){
		$sql = 'DELETE FROM customer WHERE emailAddress = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhoneNumber($value){
		$sql = 'DELETE FROM customer WHERE phoneNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountNumber($value){
		$sql = 'DELETE FROM customer WHERE accountNumber = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBank($value){
		$sql = 'DELETE FROM customer WHERE bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContractFrom($value){
		$sql = 'DELETE FROM customer WHERE contractFrom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContractTo($value){
		$sql = 'DELETE FROM customer WHERE contractTo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaxmumAmount($value){
		$sql = 'DELETE FROM customer WHERE maxmumAmount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CustomerMySql 
	 */
	protected function readRow($row){
		$customer = new Customer();
		
		$customer->customerId = $row['customerId'];
		$customer->names = $row['names'];
		$customer->idNumber = $row['idNumber'];
		$customer->emailAddress = $row['emailAddress'];
		$customer->phoneNumber = $row['phoneNumber'];
		$customer->accountNumber = $row['accountNumber'];
		$customer->bank = $row['bank'];
		$customer->contractFrom = $row['contractFrom'];
		$customer->contractTo = $row['contractTo'];
		$customer->maxmumAmount = $row['maxmumAmount'];

		return $customer;
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
	 * @return CustomerMySql 
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