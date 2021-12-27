<?php 

define ('DB_Server','localhost');
define ('DB_User','root');
define ('DB_Password','Password@123');
define ('DB_Name','db_jobtask');
    class job
	{
		function __construct()
		{
			$con=mysqli_connect(DB_Server,DB_User,DB_Password,DB_Name);
			$this->dbh=$con;
			if(mysqli_connect_errno())
			{
				echo "Connection Failed".mysqli_connect_error();
			}

		}
		
		public function cosignin($compname,$compmail,$comppass,$compnumb)
		{
			$i=0;
			$check1=mysqli_query($this->dbh,"select * from companysignin where compname='$compname'");
			$count=mysqli_num_rows($check1);
			if($count>0)
			{
				$i=$i+1;
				return($i);
			}
			else if($count==0)
			{
			
			$result2=mysqli_query($this->dbh,"insert into companysignin (`compname`,`compmail`,`comppass`,`compnumber`) values('$compname','$compmail','$comppass','$compnumb')");
			if(mysqli_affected_rows($this->dbh)>0)
			{
				$i=$i+2;
				return($i);
			}
			else 
			{

				$i=$i+3;
				return($i);
			}

			}
		}
		public function cologin($compmail,$comppass)
		{
			$result3=mysqli_query($this->dbh,"select * from companysignin where compmail='$compmail'and comppass='$comppass'");
			$res=mysqli_num_rows($result3);
			if($res>0)
			{
				session_start();
				while($row=mysqli_fetch_assoc($result3))
				{
				$_SESSION['cid']=$row['id'];
				$_SESSION['comname']=$row['compname'];
				$_SESSION['MAIL']=$compmail;
				$_SESSION['comnumb']=$row['compnumber'];
				}
			}
			return($res);
		}
		public function seekerlogin($seekername,$seekermail)
		{
			$i=0;
			$check2=mysqli_query($this->dbh,"select * from jobseeker where seekername='$seekername'and seekermail='$seekermail'");
			$count=mysqli_num_rows($check2);
			if($count>0)
			{
				session_start();
				$_SESSION['SMAIL']=$seekermail;
				$i=$i+1;
				return($i);
			}
			else
			{
			$result4=mysqli_query($this->dbh,"insert into jobseeker (`seekername`,`seekermail`) values('$seekername','$seekermail')");
			if(mysqli_affected_rows($this->dbh)>0)
			{
				session_start();
				$_SESSION['SMAIL']=$seekermail;
				$i=$i+2;
			return($i);
			}
		}
		}
		public function jobadd($compname,$jobtype,$quali,$compmail,$compnumb,$cid)
		{ 	
			$i=0;
			$check3=mysqli_query($this->dbh,"select * from addjob where jobtype='$jobtype' and compid='$cid' ");
			$count=mysqli_num_rows($check3);
			
			if($count>0)
			{
				$i=$i+1;
				return($i);
			}
			else
			{ 	
			$result5=mysqli_query($this->dbh,"insert into addjob(`compname`,`jobtype`,`qualification`,`mail`,`compnumber`,`compid`) values('$compname','$jobtype','$quali','$compmail','$compnumb','$cid')");
			if(mysqli_affected_rows($this->dbh)>0)
			{	
				$i=$i+2;
			return($i);
			}
		}
		}
		public function availablejob()
		{
			$result6=mysqli_query($this->dbh,"select  * from addjob");
			$res=mysqli_num_rows($result6);
			
			$values=array();
			if($res>0)
			{
             while($row=mysqli_fetch_assoc($result6))
			 {
				 $values[]=$row;
			 }
			 
			 return $values;
			}
			 else
			 {
				return false;
			 }
			
		}
		public function companyaddedjob($cid)
		{
			$result6=mysqli_query($this->dbh,"select  * from addjob where compid='$cid'");
			$res=mysqli_num_rows($result6);
			
			$values=array();
			if($res>0)
			{
             while($row=mysqli_fetch_assoc($result6))
			 {
				 $values[]=$row;
			 }
			 
			 return $values;
			}
			 else
			 {
				return false;
			 }
			
		}
		public function editjob($jobid)
		{
			$result7=mysqli_query($this->dbh,"select  * from addjob where id='$jobid'");
			$res=mysqli_num_rows($result7);
			
			$values=array();
			if($res>0)
			{
             while($row=mysqli_fetch_assoc($result7))
			 {
				 $values[]=$row;
			 }
			 
			 return $values;
			}
			 else
			 {
				return false;
			 }
		}
		public function jobupdate($cid,$compname,$jobtype,$quali,$compmail,$compnumb)
		{
			$i=1;
			$result8=mysqli_query($this->dbh,"update addjob set compname='$compname',jobtype='$jobtype',qualification='$quali',mail='$compmail',compnumber='$compnumb' where id='$cid'");
			if(mysqli_affected_rows($this->dbh)>0)
			{
			return($i);
		}
		}	
		public function jobdelete($jobid)
		{
			$i=1;
			$result9=mysqli_query($this->dbh,"delete from addjob where id='$jobid'");
			if(mysqli_affected_rows($this->dbh)>0)
			{
				return($i);
			}
		}
	}
?>
