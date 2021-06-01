<?php
class NetWorks extends Controller{
	function Index(){
		
		if(!isset($_SESSION['role'])) die;
	   $role=$_SESSION['role'];
	    if($role=="nhanvien") die;
	    $NetWorkDAO = $this->model("NetWorkModel");
	    $data=mysqli_fetch_all($NetWorkDAO->GetAll());
	     $view = $this->view("LayoutBinh",__CLASS__, [
                "Controller" => "Network",
                "View" => "Index",
                "Data" => $data,
                
            ]);
       
            echo $view;
	}
	  public function Update()	
	  {
	  
		
		if(!isset($_SESSION['role'])) die;
	   $role=$_SESSION['role'];
	    if($role=="nhanvien") die;
	    $Id=$_POST["Id"];
	    $Ten=$_POST["Ten"];
	    $DayDauSo=$_POST["DayDauSo"];
	    $NetWorkDAO = $this->model("NetWorkModel");
	    $result=$NetWorkDAO->Update($Id,$Ten,$DayDauSo);
	    echo "ok";
	  }
}
?>