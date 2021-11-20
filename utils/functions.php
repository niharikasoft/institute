<?php
function getBranches($id = null){
    include "include/dbconfig.php";
    
    $sql = "SELECT * FROM `branches`";
    $res = mysqli_query($conn, $sql);
    $option = '';
    while($row = mysqli_fetch_assoc($res)){
        if($id && $row['id'] == $id){
            $option .= '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
        }else{
            $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';  
        }
       
    }
    
    return  $option;

}
function getCourseByInstitute($instituteId){
    include "include/dbconfig.php";
    
    $sql = "SELECT * FROM `courses` WHERE `institute_id`='$instituteId'";
    $res = mysqli_query($conn, $sql);
    $option = '';
    while($row = mysqli_fetch_assoc($res)){
        $option .= '<option value="'.$row['id'].'">'.$row['course_name'].'</option>';        
    }
    
    return  $option;

}
function getEmployeeById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `employees` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    return  $row;

}
function getBranchesById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `branches` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    return  $row;

}
function getInstitutesById($id){
    include "include/dbconfig.php";
   
    $sql = "SELECT * FROM `institutes` 
            INNER JOIN  `users` 
            ON `institutes`.id = `users`.org_id
            WHERE `institutes`.`id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    return  isset($row) ? $row : null;
}
function getCourseById($id){
    include "include/dbconfig.php";
    $sql = "SELECT * FROM `courses` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    return  isset($row) ? $row : null;
}
function menuOpen($pages, $currentPage){
    if(in_array($currentPage, $pages)){
       echo 'menu-open' ;
    }
}
function activePage($pages, $currentPage){
    if(in_array($currentPage, $pages)){
       echo 'active' ;
    }
}

function getRegistrationNo($courseId, $instituteCode)
{
    include "include/dbconfig.php";
    $sql = "SELECT COUNT(*) AS numbr FROM `admissions` WHERE `institute_id`='$_SESSION[institute_id]' AND `course_id`='$courseId'" ;
    $res = mysqli_query($conn, $sql) ;
    $row = mysqli_fetch_array($res);
    $course = getCourseById($courseId) ;
   // print_r($course);
    $registrationNo = $instituteCode.$course['course_code'].str_pad(($row['numbr'] + 1), 3, '0', STR_PAD_LEFT);
    
   return $registrationNo;
}

function getActiveAdmissions($instituteId)
{
    include "include/dbconfig.php";
    $sql="SELECT `admissions`.*, students.*, courses.* FROM `admissions`
          INNER JOIN `students` ON students.id = admissions.student_id
          INNER JOIN `courses` ON admissions.course_id = courses.id
          WHERE admissions.status = 'active' AND admissions.institute_id='$instituteId'
          ORDER BY admissions.id DESC
          " ;
    $res    = mysqli_query($conn, $sql) ;
    $result = array();
    while($row = mysqli_fetch_assoc($res))
    {
        extract($row);
        $result[] =  $row;

    }
    return json_encode($result);

}
?>