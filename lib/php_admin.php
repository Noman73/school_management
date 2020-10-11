<?php
include "database.php";
include "session_ad_login.php";

class admin{
	private $db;
	public function __construct(){
		$this->db=new database();
	}

	public function addStudent($data,$files){
		$name=$data['name'];
		$username=$data['username'];
		$department=$data['department'];
		$session=$data['session'];
		$semister=$data['semister'];
		$roll=$data['roll'];
		$permitted=array('jpg','jpeg','png');
		$image_name=$files['image']['name'];
		$image_size=$files['image']['size'];
		$tmp_name=$files['image']['tmp_name'];
		$ext_div=explode('.',$image_name);
		$img_ext=end($ext_div);
		$unq_name=substr(md5(time()), 0,10);
		$folder="../uploads/".$unq_name.'.'.$img_ext;

		$chk_usrname=$this->checkUsrName($username);

		if ($name=="" or $username=="" or $department=="" or $session=="" or $image_name=="" or $semister=="" or $roll=="") {
			$msg="<div class='alert alert-danger'><strong>Error !</strong> field must not be empty</div>";
			return $msg;
		}

		if (in_array($img_ext, $permitted)===false) {
			$msg="<div class='alert alert-danger'><span><strong>error!</strong>You can upload jpeg, jpg, gif, png format only</span></div>";
			return $msg;
		}

		if ($image_size>1048567) {
			$msg="<div class='alert alert-danger'><span><strong>error!</strong>Image size must be less than 1 MB</span></div>";
			return $msg;
		}
		if (strlen($username)<3) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>username is too short! Username must be greater than 3 character</div>";
			return $msg;
		}

		if (preg_match('/[^A-Za-z0-9 ]/', $name)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Name must be english</div>";
  			return $msg;
		}
		if (preg_match('/[^0-9]/', $roll)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Roll must be number</div>";
  			return $msg;
		}
		if (preg_match('/[^a-z0-9]/', $username)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Username must be english character</div>";
  			return $msg;
		}
		$sql="select roll from addstudents where roll=:roll";
		$stmt=$this->db->pdo->prepare($sql);
		$stmt->bindValue(':roll',$roll);
		$stmt->execute();
		$row=$stmt->rowCount();
		if ($row>0) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>this roll number already exist</div>";
  			return $msg;
		}

		if ($chk_usrname==true) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>Username already exist</div>";
			return $msg;
		}
		move_uploaded_file($tmp_name,$folder);
		$folder_exp=explode('/',$folder);
		$folder_slice=array_slice($folder_exp,2);

		$sql="INSERT INTO addstudents(name,username,department,session,semister,image,roll) VALUES(:name,:username,:department,:session,:semister,:image,:roll)";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':department',$department);
		$query->bindValue(':session',$session);
		$query->bindValue(':semister',$semister);
		$query->bindValue(':image',implode('/',$folder_slice));
		$query->bindValue(':roll',$roll);
		$query->execute();
		if($query){
			$msg="<div class='alert alert-success'><strong>Success !</strong>you have been registered</div>";
			return $msg;
		}

	}
		## for validate username similarity!!!

	public function checkUsrName($username){
		$sql="select username from addstudents where username=:username;";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':username',$username);
		$query->execute();
		if ($query->rowCount()>0) {
			return true;
		}else{
			return false;
		}
	}

	##this function for add_Student page

	public function getAddStudentData(){
		$sql="SELECT * FROM addstudents ORDER BY id";
		$query=$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

	## this function for payment page

	public function getLoginUser($department,$roll){
		$sql="SELECT * FROM addstudents WHERE department=:department and roll=:roll";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':department',$department);
		$query->bindValue(':roll',$roll);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
### from fetch all data using department and roll
	public function logStudent($data){
		$department=$data['department'];
		$roll=$data['roll'];

		if ($department=="" or $roll=="") {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>field must not be empty</div>";
			return $msg;
		}

		$sql="SELECT * FROM addstudents WHERE department=:department and roll=:roll";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':department',$department);
		$query->bindValue(':roll',$roll);
		$query->execute();
		$row=$query->rowCount();
		if ($row<=0) {
		$msg="<div class='alert alert-danger'><strong>Error !</strong>department and roll not matched</div>";
			return $msg;
		}else{
			header("location: st_profile.php?department=$department&roll=$roll");
		}
	
	}

	## this function for payment page
	public function payment($data){
	$department=$data['dept'];
	$roll=$data['roll'];
	$semister=$data['semister'];
	$date=$data['date'];
	$fees=$data['fees'];
	$ammount=$data['ammount'];

		if ($department=="" or $roll=="" or $semister=="" or $fees=="" or $ammount=="") {
			$msg="<div class='alert alert-danger'><strong>error !</strong>field must not be empty</div>";
			return $msg;
		}


		$sql="INSERT INTO payment(department,semister,roll,fees,ammount,dates) values(:department,:semister,:roll,:fees,:ammount,:dates)";

		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':department',$department);
		$query->bindValue(':semister',$semister);
		$query->bindValue(':roll',$roll);
		$query->bindValue(':fees',$fees);
		$query->bindValue(':ammount',$ammount);
		$query->bindValue(':dates',$date);
		$query->execute();
		if ($query) {
			$msg="<div class='alert alert-success'><strong>error !</strong>inserted successfull</div>";
			return $msg;
		}else{
			$msg="<div class='alert alert-danger'><strong>error !</strong>something wrong</div>";
			return $msg;
		}

	}

	public function getPaymentRecord($department,$st_roll){
		$sql="select * from payment where department=:department and roll=:roll";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':department',$department);
		$query->bindValue(':roll',$st_roll);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}


	public function newsUpdate($data){
		$news=$data['news'];
		if ($news=="") {
			$msg="<div class='alert alert-danger'><strong>error !</strong>field must not be empty</div>";
			return $msg;
		}

		$sql="INSERT INTO news_update(news) values(:news)";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':news',$news);
		$query->execute();
		header("Location: ../index.php");
	}

	public function adminLogin($data){
		$username=$data['username'];
		$password=$data['password'];;

		if ($username=="" or $password=="") {
			$msg="<div class='alert alert-danger'><strong>error !</strong>field must not be empty</div>";
			return $msg;
		}

		$sql="select * from admin_reg where username=:username and password=:password limit 1";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':username',$username);
		$query->bindValue(':password',$password);
		$query->execute();
		$row=$query->rowCount();
		if ($row<=0) {
			$msg="<div class='alert alert-danger'><strong>error !</strong>username or password is wrong</div>";
			return $msg;
		}
		$result=$query->fetch(PDO::FETCH_OBJ);
		if ($result->role) {
			$role=$result->role;
		}
		if($role=="admin") {
			session_ad_login::init();
			session_ad_login::set('admin_login',true);
			session_ad_login::set('name',$result->name);
			session_ad_login::set('role',$result->role);
			session_ad_login::set('username',$result->username);
			session_ad_login::set('department',$result->department);
			header("location: index.php");
		}elseif ($role==="teacher") {
			session_ad_login::init();
			session_ad_login::set('tcr_login',true);
			session_ad_login::set('name',$result->name);
			session_ad_login::set('role',$result->role);
			session_ad_login::set('username',$result->username);
			session_ad_login::set('department',$result->department);
			header("location: teacher.php");
		}
	}
	public function select($sql){
	$query=$this->db->pdo->prepare($sql);
	$query->execute();
	$result=$query->fetchAll();
	return $result;
	}
	public function selectStd($dept,$semi){
		$sql="select name,roll from addstudents where department=:dept and semister=:semi order by id";
	$query=$this->db->pdo->prepare($sql);
	$query->bindValue(':dept',$dept);
	$query->bindValue(':semi',$semi);
	$query->execute();
	$result=$query->fetchAll();
	return $result;
	}


	public function attendancePrepare($data){
		$semi=$data['semister'];
		$sub=$data['subject'];
		$dept=$data['department'];
		if (!isset($semi)) {
			$msg="data not found";
			return $msg;
		}elseif (!isset($sub)) {
			$msg="data not found";
			return $msg;
		}elseif (!isset($dept)) {
			$msg="data not found";
			return $msg;
		}
		header("Location: attendance2.php?semi=$semi&sub=$sub&dept=$dept");
	}

	public function attSubmit($data,$attend=array()){
		$sub=$data['subject'];
		$dept=$data['dept'];
		$semister=$data['semi'];
		foreach ($attend as $key => $value) {
			if ($value=="present" and $dept=="Computer") {
				$query="INSERT INTO attendance_cmt(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"present");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			}elseif($value=="absent" and $dept=="Computer") {
				$query="INSERT INTO attendance_cmt(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"absent");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			#/computer/ 
			}elseif($value=="present" and $dept=="Civil") {
				$query="INSERT INTO attendance_cvl(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"present");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			}elseif($value=="absent" and $dept=="Civil") {
				$query="INSERT INTO attendance_cvl(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"absent");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			}elseif($value=="present" and $dept=="Electrical") {
				$query="INSERT INTO attendance_Elc(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"present");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			}elseif($value=="absent" and $dept=="Electrical") {
				$query="INSERT INTO attendance_elc(roll,count,sub_code,semister) values(:key,:attend,:sub_code,:semister)";
			$stmt=$this->db->pdo->prepare($query);
			$stmt->bindValue(':key',$key);
			$stmt->bindValue(':attend',"absent");
			$stmt->bindValue(':sub_code',$sub);
			$stmt->bindValue(':semister',$semister);
			$stmt->execute();
			}
		}
	}
	## attendance system end

	public function addSubject($data){
		$sub_name=$data['sub_name'];
		$sub_code=$data['sub_code'];
		$dept=$data['dept'];
		if ($sub_name=="" or $sub_code=="" or $dept=="") {
			$msg="<div class='alert alert-danger'><strong>Error !</strong> field must not be empty</div>";
			return $msg;
		}
		if (strlen($sub_name)>100) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>username is too long! less than 100 char</div>";
			return $msg;
		}

		if (preg_match('/[^0-9 ]/', $sub_code)){
  			$msg="<div class='alert alert-danger'> <strong>Error !</strong>subject code must be number char</div>";
  			return $msg;
		}
		$sql="INSERT INTO add_subject(sub_code,sub_name,department) values(:sub_code,:sub_name,:dept)";
		$stmt=$this->db->pdo->prepare($sql);
		$stmt->bindValue(':sub_name',$sub_name);
		$stmt->bindValue(':sub_code',$sub_code);
		$stmt->bindValue(':dept',$dept);
		$stmt->execute();

	}

	public function countRow($query){
	$stmt=$this->db->pdo->prepare($query);
	$stmt->execute();
	$row=$stmt->rowCount();
	return $row;
	}
	public function countRowWithBind($query,$data){
	$stmt=$this->db->pdo->prepare($query);
	$stmt->bindValue(':dept',$data);
	$stmt->execute();
	$row=$stmt->rowCount();
	return $row;
    }
    public function feesSearch($data){
    	$roll=$data['roll'];
    	$sql="select * from payment where roll=:roll order by id";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':roll',$roll);
    	$query->execute();
    	$data=$query->fetchAll();
    	return $data;
    }
    public function addTeacher($data,$files){
    	$name=$data['name'];
    	$username=$data['username'];
    	$department=$data['department'];
    	$permitted=array('jpg','jpeg','png');
		$image_name=$files['image']['name'];
		$image_size=$files['image']['size'];
		$tmp_name=$files['image']['tmp_name'];
		$ext_div=explode('.',$image_name);
		$img_ext=end($ext_div);
		$unq_name=substr(md5(time()), 0,10);
		$folder="../tcr/".$unq_name.'.'.$img_ext;

		$sql="select id from add_teacher where username=:usrname";
		$stmt=$this->db->pdo->prepare($sql);
		$stmt->bindValue(':usrname',$username);
		$stmt->execute();
		$row=$stmt->rowCount();
		if ($row>0) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong> username alreay exist</div>";
			return $msg;
		}

		if ($name=="" or $username=="" or $department=="" or $image_name=="") {
			$msg="<div class='alert alert-danger'><strong>Error !</strong> field must not be empty</div>";
			return $msg;
		}

		if (in_array($img_ext, $permitted)===false) {
			$msg="<div class='alert alert-danger'><span><strong>error!</strong>You can upload jpeg, jpg, gif, png format only</span></div>";
			return $msg;
		}

		if ($image_size>1048567) {
			$msg="<div class='alert alert-danger'><span><strong>error!</strong>Image size must be less than 1 MB</span></div>";
			return $msg;
		}
		if (strlen($username)<3) {
			$msg="<div class='alert alert-danger'><strong>Error !</strong>username is too short! Username must be greater than 3 character</div>";
			return $msg;
		}

		if (preg_match('/[^A-Za-z0-9 ]/', $name)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Name must be english</div>";
  			return $msg;
		}
		if (preg_match('/[^a-z0-9]/', $username)){
  			$msg="<div class='alert alert-danger'><strong>Error !</strong>Username must be english character</div>";
  			return $msg;
		}
		
		move_uploaded_file($tmp_name,$folder);
		$folder_exp=explode('/',$folder);
		$folder_slice=array_slice($folder_exp,2);
		$sql="INSERT INTO add_teacher(name,username,department,image) VALUES(:name,:username,:department,:image)";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':department',$department);
		$query->bindValue(':image',implode('/',$folder_slice));
		$query->execute();
		if($query){
			$msg="<div class='alert alert-success'><strong>Success !</strong>you have been registered</div>";
			return $msg;
		}

    }

    public function getStudentInfo($data){
    	$roll=$data['query'];
    	$sql="SELECT * FROM addstudents where roll=:roll limit 1";
    	$stmt=$this->db->pdo->prepare($sql);
    	$stmt->bindValue(':roll',$roll);
    	$stmt->execute();
    	$result=$stmt->fetch(PDO::FETCH_OBJ);
    	return $result;
    }
    public function insertDue($data){
    	$name=$data['name'];
    	$roll=$data['roll'];
    	$semister=$data['semister'];
    	$fees_type=$data['type'];
    	$ammount=$data['ammount'];

    	if ($name=="" or $roll=="" or $semister=="" or $fees_type=="" or $ammount=="") {
    		$msg="<div class='alert alert-danger'><strong>error !</strong> field must not be empty</div>";
    		return $msg;
    	}
    	$sql="INSERT INTO due(name,roll,semister,fees_type,ammount) values(:name,:roll,:semister,:fees_type,:ammount)";
    	$stmt=$this->db->pdo->prepare($sql);
    	$stmt->bindValue(':name',$name);
    	$stmt->bindValue(':roll',$roll);
    	$stmt->bindValue(':semister',$semister);
    	$stmt->bindValue(':fees_type',$fees_type);
    	$stmt->bindValue(':ammount',$ammount);
    	$stmt->execute();
    	if ($stmt){
    		$msg="<div class='alert alert-success'><strong>Success !</strong> due listed success</div>";
    		return $msg;
    	}
    }
    public function objSelect($query){
	    $stmt=$this->db->pdo->prepare($query);
	    $stmt->execute();
	    $data=$stmt->fetch(PDO::FETCH_OBJ);
	    return $data;
	}
	 public function post($data){
		$title=$data['title'];
		$dept=$data['dept'];
		$details=$data['details'];
		$name=$data['name'];
		if ($title=="" or $dept=="" or $details=="" or $name==""){
			$msg="<div class='alert alert-danger'><strong>error !</strong> field must not be empty</div>";
			return $msg;
		}

		$sql="INSERT INTO post(name,title,dept,details) values(:name,:title,:dept,:details)";
		$stmt=$this->db->pdo->prepare($sql);
		$stmt->bindValue(':name',$name);
		$stmt->bindValue(':title',$title);
		$stmt->bindValue(':dept',$dept);
		$stmt->bindValue(':details',$details);
		$stmt->execute();
		if ($stmt) {
			$msg="<div class='alert alert-success'><strong>success !</strong> posted success</div>";
			return $msg;
		}
	}


}
	
?>