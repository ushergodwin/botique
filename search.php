<?php require_once 'config.php';
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT name FROM blazers WHERE name LIKE ? UNION SELECT name FROM shoes WHERE name LIKE ? UNION SELECT name FROM skirts WHERE name  LIKE ? UNION SELECT name FROM trousers WHERE name  LIKE ? UNION SELECT name FROM tops WHERE name  LIKE ? UNION SELECT name FROM dresses WHERE name  LIKE ? UNION SELECT name FROM bags WHERE name  LIKE ? UNION SELECT name FROM beauty WHERE name  LIKE ? UNION SELECT name FROM accessories WHERE name  LIKE ?";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssssssss", $param_term, $param_term, $param_term, $param_term, $param_term, $param_term, $param_term, $param_term, $param_term);
        
        // Set parameters
        $param_term = '%'.$_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            // Check number of rows in the result set
            if($result->num_rows > 0){
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<p>" . $row["name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not be able to execute";
        }
    }
     
    // Close statement

}
 
// Close connection
?>