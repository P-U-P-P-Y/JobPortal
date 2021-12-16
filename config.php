<?php

    $server='localhost';
    $username='root';
    $pass='';
    $database='jobs';
    $conn= new mysqli($server,$username,$pass,$database);

    // $name=$_POST['name'];
    // $email=$_POST['email'];
    // $number=$_POST['phone_no'];
    // $password=$_POST['password'];
     
    echo "";

    if($conn->connect_error)
    {
            die("Connection Failed : ".$conn->connect_error);
    }

    elseif (isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['phone_no'];
        $password=$_POST['password'];

        $stmt = $conn->prepare("INSERT INTO users( name, email, phone_no, password ) VALUES (?,?,?,?)");
            $stmt->bind_param("ssis",$name,$email,$number,$password);
            $stmt->execute();
            $flag=1;
            if($flag=1){
                header("location:index.php");
            }
            $stmt->close();
            $conn->close();
    }

    session_start();
    if(isset($_POST['login']))
{
        $email=$_POST['email'];
        $password=$_POST['password'];
 
        $query="SELECT * FROM users WHERE `email`='$email' AND `password` = '$password'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(mysqli_num_rows($result)>=1){
            header("location:index.php");
        }
        else{
            echo '<script>alert("Email Id or Password is Incorrect")</script>';
        }
}

if(isset($_POST['post']))
{
    $day = date("d M Y");
    $cname=$_POST['cname'];
    $post=$_POST['pos'];
    $opens=$_POST['opens'];
    $jdesc=$_POST['jdesc'];
    $skills=$_POST['skills'];
    $ctc=$_POST['ctc'];

    $posts = $conn->prepare("INSERT INTO posts(day, cname, post, opens, jdesc, skills, ctc) VALUES (?,?,?,?,?,?,?)");
    $posts->bind_param("sssisss",$day,$cname,$post,$opens,$jdesc,$skills,$ctc);
    $posts->execute();
    $flag=1;
    if($flag=1){
        echo '<script>alert("Job Posted Successfully !")</script>';
    }
    $posts->close();
    // $conn->close();

}
   
if(isset($_POST['apply_btn']))
{
     $aname=$_POST['aname'];
     $qual=$_POST['qual'];
     $exp=$_POST['exp'];
     $year=$_POST['year'];
     $days = date("d M Y");
    $app="INSERT INTO `applicants`(`aday`, `aname`, `aqual`, `aexp`, `ayear`) VALUES ('$days','$aname','$qual','$exp','$year')";
    // var_dump($app);
    // die();
    mysqli_query($conn,$app);
    $flag=1;
    if($flag=1){
        echo '<script>alert("Applied Successfully !")</script>';
    }
    
}
            
?>