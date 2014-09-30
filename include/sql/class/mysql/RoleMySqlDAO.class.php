<?php
/**
 * Class that operate on table 'role'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
class RoleMySqlDAO implements RoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RoleMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM role WHERE roleId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM role';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM role ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param role primary key
 	 */
	public function delete($roleId){
		$sql = 'DELETE FROM role WHERE roleId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($roleId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RoleMySql role
 	 */
	public function insert($role){
		$sql = 'INSERT INTO role (roleName, roleDescription) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($role->roleName);
		$sqlQuery->set($role->roleDescription);

		$id = $this->executeInsert($sqlQuery);	
		$role->roleId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RoleMySql role
 	 */
	public function update($role){
		$sql = 'UPDATE role SET roleName = ?, roleDescription = ? WHERE roleId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($role->roleName);
		$sqlQuery->set($role->roleDescription);

		$sqlQuery->setNumber($role->roleId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM role';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRoleName($value){
		$sql = 'SELECT * FROM role WHERE roleName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
	         public function searchByKeyword($message){
		$sql = 'SELECT * FROM role WHERE roleName like \'%' . $message.'%\'';
		$sqlQuery = new SqlQuery($sql);
		
		
		return $this->getList($sqlQuery);
	}

	public function queryByRoleDescription($value){
		$sql = 'SELECT * FROM role WHERE roleDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRoleName($value){
		$sql = 'DELETE FROM role WHERE roleName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRoleDescription($value){
		$sql = 'DELETE FROM role WHERE roleDescription = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RoleMySql 
	 */
	protected function readRow($row){
		$role = new Role();
		
		$role->roleId = $row['roleId'];
		$role->roleName = $row['roleName'];
		$role->roleDescription = $row['roleDescription'];

		return $role;
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
	 * @return RoleMySql 
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