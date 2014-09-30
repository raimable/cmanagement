<?php
/**
 * Class that operate on table 'cluster'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-03 20:03
 */
class ClusterMySqlDAO implements ClusterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ClusterMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cluster WHERE clusterId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cluster';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cluster ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cluster primary key
 	 */
	public function delete($clusterId){
		$sql = 'DELETE FROM cluster WHERE clusterId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($clusterId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ClusterMySql cluster
 	 */
	public function insert($cluster){
		$sql = 'INSERT INTO cluster (clusterName) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cluster->clusterName);

		$id = $this->executeInsert($sqlQuery);	
		$cluster->clusterId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ClusterMySql cluster
 	 */
	public function update($cluster){
		$sql = 'UPDATE cluster SET clusterName = ? WHERE clusterId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cluster->clusterName);

		$sqlQuery->setNumber($cluster->clusterId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cluster';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClusterName($value){
		$sql = 'SELECT * FROM cluster WHERE clusterName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClusterName($value){
		$sql = 'DELETE FROM cluster WHERE clusterName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ClusterMySql 
	 */
	protected function readRow($row){
		$cluster = new Cluster();
		
		$cluster->clusterId = $row['clusterId'];
		$cluster->clusterName = $row['clusterName'];

		return $cluster;
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
	 * @return ClusterMySql 
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