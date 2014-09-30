<?php
/**
 * Class that operate on table 'service'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
class ServiceMySqlDAO implements ServiceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ServiceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM service WHERE serviceId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM service';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM service ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param service primary key
 	 */
	public function delete($serviceId){
		$sql = 'DELETE FROM service WHERE serviceId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($serviceId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ServiceMySql service
 	 */
	public function insert($service){
		$sql = 'INSERT INTO service (serviceDescription) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($service->serviceDescription);

		$id = $this->executeInsert($sqlQuery);	
		$service->serviceId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ServiceMySql service
 	 */
	public function update($service){
		$sql = 'UPDATE service SET serviceDescription = ? WHERE serviceId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($service->serviceDescription);

		$sqlQuery->setNumber($service->serviceId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM service';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByServiceDescription($value){
		$sql = 'SELECT * FROM service WHERE serviceDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByServiceDescription($value){
		$sql = 'DELETE FROM service WHERE serviceDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ServiceMySql 
	 */
	protected function readRow($row){
		$service = new Service();
		
		$service->serviceId = $row['serviceId'];
		$service->serviceDescription = $row['serviceDescription'];

		return $service;
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
	 * @return ServiceMySql 
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