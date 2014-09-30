<?php
/**
 * Class that operate on table 'user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-23 00:19
 */
class UserMySqlDAO implements UserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UserMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM user WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM user';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM user ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($userId){
		$sql = 'DELETE FROM user WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($userId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserMySql user
 	 */
	public function insert($user){
		$sql = 'INSERT INTO user (names, username, password, roleId) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->names);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->password);
		$sqlQuery->setNumber($user->roleId);

		$id = $this->executeInsert($sqlQuery);	
		$user->userId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserMySql user
 	 */
	public function update($user){
		$sql = 'UPDATE user SET names = ?, username = ?, password = ?, roleId = ? WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->names);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->roleId);

		$sqlQuery->setNumber($user->userId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM user';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNames($value){
		$sql = 'SELECT * FROM user WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
        
         public function searchByKeyword($message){
		$sql = 'SELECT * FROM user WHERE names like \'%' . $message.'%\'';
		$sqlQuery = new SqlQuery($sql);
		
		
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM user WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getRow($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRoleId($value){
		$sql = 'SELECT * FROM user WHERE roleId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNames($value){
		$sql = 'DELETE FROM user WHERE names = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM user WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRoleId($value){
		$sql = 'DELETE FROM user WHERE roleId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UserMySql 
	 */
	protected function readRow($row){
		$user = new User();
		
		$user->userId = $row['userId'];
		$user->names = $row['names'];
		$user->username = $row['username'];
		$user->password = $row['password'];
		$user->roleId = $row['roleId'];

		return $user;
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
	 * @return UserMySql 
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

    public function deleteByEmail($value) {
        
    }

    public function deleteByInstitutionId($value) {
        
    }

    public function queryByEmail($value) {
        
    }

    public function queryByInstitutionId($value) {
        
    }
}
?>