<?php
function getUnit($id)
{
 include "sidebar.php"; 
 include "dbconfig.php";

 $sql = "SELECT * FROM `unit` where id='$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($res);
 return $row;
}

function getItem($id)
{
 include "sidebar.php";
 include "dbconfig.php";
 
 $sql = "SELECT * FROM `product` where id='$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($res);
 return $row;
}

function getCat($id)
{
 include "sidebar.php";
 include "dbconfig.php";
 
 $sql = "SELECT * FROM `category` where id='$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($res);
 return $row;
}
function getParty($id)
{
 include "sidebar.php";
 include "dbconfig.php";
 
 $sql = "SELECT * FROM `party` where id='$id'";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($res);
 return $row;
}
function getProduct()
	{
		include "include/dbconfig.php"
		$sql = "SELECT * FROM `product`";
        $res = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($res))
		  {
			$option.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
		  }
		echo $option;
	}
	

?>