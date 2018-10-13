<?php 
include_once("db.class.php");
class QueryBuilder extends DBConn{

	public function Select($query){
		self::setConnection();
		$rezultat=DBConn::getConnection()->query($query);
		while ($row=$rezultat->fetch_assoc()) {
			$resultArray[]=$row;
		}
		self::closeConnection();
		return isset($resultArray) ? $resultArray : null;
	}
	
	public function Insert($table,$parameters){
		self::setConnection();
		// die(var_dump(implode(', ', array_keys($parameters))));
		$query=sprintf("INSERT INTO %s (%s) VALUES (%s)",
			$table, 
			implode(', ', array_keys($parameters)), 
			implode(', ', self::mapParams(array_values($parameters)))
		);
		if (DBConn::getConnection()->query($query) === TRUE) {
		    $resultArray['insert_id']=DBConn::getConnection()->insert_id;
		} else {
		    $resultArray["errno"]= DBConn::getConnection()->errno;
			$resultArray["error"]= DBConn::getConnection()->error;
		}
		self::closeConnection();
		return isset($resultArray) ? $resultArray : "ivane kujo jedna";
	}

	private function mapParams($params) {
		$arr = array_map(function($param) {
			return '\'' . $param . '\'';
		}, $params);
		return $arr;
	} 

	public function Delete($table,$id){
		self::setConnection();

		$query=sprintf("DELETE FROM %s WHERE ID_%s = %s",$table,$table,$id);
		if (DBConn::getConnection()->query($query) === TRUE) {
		    $resultArray['insert_id']=DBConn::getConnection()->insert_id;
		} else {
		    $resultArray["errno"]= DBConn::getConnection()->errno;
			$resultArray["error"]= DBConn::getConnection()->error;
		}
		self::closeConnection();
		return isset($resultArray) ? $resultArray : "ivane kujo jedna";
	}

public function Update($table, $id, $parameters){
		self::setConnection();
		// die(var_dump(implode(', ', array_keys($parameters))));
		$query=sprintf(
			'UPDATE %s
			SET %s
			WHERE id_%s=%s;',
			$table, 
			implode(', ', self::updateMapParams($parameters)),
			$table,
			$id
		);
		// die(var_dump($query));
		if (DBConn::getConnection()->query($query) === TRUE) {
		    $resultArray['insert_id']=DBConn::getConnection()->insert_id;
		} else {
		    $resultArray["errno"]= DBConn::getConnection()->errno;
			$resultArray["error"]= DBConn::getConnection()->error;
		}
		// self::$connection->query($query);
		self::closeConnection();
		return isset($resultArray) ? $resultArray : "ivane kujo jedna";
	}

	private function updateMapParams($params){
		// $arr = array_map(function($param) {
		// 	return $param;
		// }, $params);
		// return $arr;
		$arr = [];
		foreach ($params as $key => $value) {
			$arr[] = $key . '=\'' . $value . '\'';
		}
		return $arr;
	}
}
