<?php session_start(); require_once 'config.php';
    $file_ex = ".txt"; $admin_name = ""; $comp = "compare-";
     $user_name = $_SESSION['chat'];
if(isset($_REQUEST['read'])){
    $stmt = $conn->prepare("SELECT inquirer, response_file, name FROM admin WHERE inquirer = ? && status = ?");
          $stmt->bind_param("ss", $param_username, $param_status);
          $param_username = $user_name;
          $param_status = "online";
          $stmt->execute();
          $result = $stmt->get_result();
          $get_admin_file = $result->fetch_assoc();
          $admin_name = $get_admin_file['name'];
                
    if(!empty($get_admin_file)){
        $_SESSION['start'] = true;
      $admin_file =$get_admin_file['response_file'];
        $file_name = $admin_file;
        $lines = array();
        $read_file = fopen("$file_name", 'r');
           while(!feof($read_file)){
           $all_lines = fgets($read_file);
               array_push($lines, $all_lines);
               }
        $data = $lines;
        echo "<p class='name'>$admin_name</p> <br>";
        foreach($data as $last) {
            echo "<p class='admin-chat'>$last</p>";
        }
        fclose($read_file);
    }else{
        echo "<p class='admin-chat'>Please hold on as our respondent comes</p>";
    }
}
if(isset($_REQUEST['read_user'])){
    $file_name = $user_name.$file_ex;
    $lines = array();
    $fp = fopen("$file_name", 'r');
    while(!feof($fp)) {
     $all_lines = fgets($fp);
        array_push($lines, $all_lines);
    }
         $data = $lines;
            echo "<p class='name'>$user_name</p> <br>";
                foreach($data as $last) {
           echo "<p class='user-chat'>$last</p>";           
        }

    fclose($fp);
  
}

    if(isset($_POST['user_query'])){     
       $file_name = $user_name.$file_ex;
       $file = fopen("$file_name", 'a+');
        $query = $_POST['query'];
        $date = date("D H:i:s")."\n";
        $space = "&nbsp; &nbsp;&nbsp;";
        fwrite($file, $query.$space.$date);

        fclose($file);  
          
      }    
