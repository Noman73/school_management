<?php
include "user_session.php";
include "database.php";

class user{
	private $db;

	public function __construct(){
		$this->db=new database();
	}


	public function loginUser($data){
		$username=$data['username'];
		$roll=$data['roll'];
		
		if ($username=="" or $roll=="") {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>field must not be empty</div>";
			return $msg;
		}

		if (preg_match('/[^a-z0-9]/', $username)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Username must be english and lower case latter or number </div>";
  			return $msg;
  		}

		$result=$this->getStudentProfile($username,$roll);
		if ($result) {
			user_session::init();
			user_session::set('login',true);
			user_session::set('id',$result->id);
			user_session::set('name',$result->name);
			user_session::set('roll',$result->roll);
			user_session::set('username',$result->username);
			user_session::set('image',$result->image);
			user_session::set('department',$result->department);
			user_session::set('session',$result->session);
			user_session::set('date',$result->dates);
			header("Location: student_profile.php");
		}

	}
	public function getStudentProfile($username,$roll){
		$sql="SELECT * FROM addstudents WHERE username=:username and roll=:roll";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue('username',$username);
		$query->bindValue('roll',$roll);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;


	}
	public function getpaymentrecord(){
		$username=user_session::get('username');
		$roll=user_session::get('roll');

		$sql="SELECT * FROM payment where roll=:roll order by id";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':roll',$roll);
		$query->execute();
		$result=$query->fetchAll();
		return $result;

	}
	public function getNewsUpdate(){
		$sql="select * from news_update order by id desc";
		$query=$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function select($query){
		$data=$this->db->pdo->prepare($query);
		$data->execute();
		$result=$data->fetchAll();
		return $result;
	}
	public function objSelect($query){
		$data=$this->db->pdo->prepare($query);
		$data->execute();
		$result=$data->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function insertMsg($data){
		$msg=$data['msg'];
		$id=$data['req_id'];	
		$senderid=user_session::get('id');
		if ($msg=="") {
			$msg="field must not be empty";
			return $msg;
		}

		if ($id=="") {
			$msg="please select a User for sent message";
			return $msg;
		}

		$sql="INSERT INTO messaging(senderid,reqid,message) values(:senderid,:reqid,:message)";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':senderid',$senderid);
		$query->bindValue(':reqid',$id);
		$query->bindValue(':message',$msg);
		$query->execute();
	}
		public function selectMsg($query,$reqid,$ownid){
		$data=$this->db->pdo->prepare($query);
		$data->bindValue(':ownid',$ownid);
		$data->bindValue(':reqid',$reqid);
		$data->execute();
		$result=$data->fetchAll();
		$result=array_reverse($result);
		return $result;
	}
	public function totalPays($query,$roll){
    	$stmt=$this->db->pdo->prepare($query);
    	$stmt->bindValue(':roll',$roll);
    	$stmt->execute();
    	$data=$stmt->fetch(PDO::FETCH_OBJ);
    	return $data;
    }
    public function getDueRecord(){
    	$roll=user_session::get('roll');
    	$sql="select * from due where roll=:roll;";
    	$stmt=$this->db->pdo->prepare($sql);
    	$stmt->bindValue(':roll',$roll);
    	$stmt->execute();
    	$data=$stmt->fetchAll();
    	return $data;
    }
    public function getPost($sql,$dept){
    	$stmt=$this->db->pdo->prepare($sql);
    	$stmt->bindValue(':dept',$dept);
    	$stmt->execute();
    	$data=$stmt->fetchAll();
    	return $data;
    }
   
}

?>