<?php
// Establish database connection
include "db_config.php";

// Check if int_id is provided and valid
if(isset($_GET['int_id']) && is_numeric($_GET['int_id'])) {
    $int_id = $_GET['int_id'];
    
    // Prepare and execute SQL query to retrieve resume data
    $stmt = $conn->prepare("SELECT int_resume, int_resume_type FROM internship WHERE int_id = ?");
    $stmt->bind_param("i", $int_id);
    $stmt->execute();
    $stmt->store_result();  
    
    // Check if resume data exists
    if($stmt->num_rows > 0) {
        $stmt->bind_result($int_resume, $int_resume_type);
        $stmt->fetch();
        
        // Set appropriate headers for file download
        header("Content-type: $int_resume_type");
        header("Content-Disposition: attachment; filename='resume_$int_id'");
        
        // Output resume data
        echo $int_resume;
    } else {
        echo "Resume not found!";
    }
    
    // Close statement
    $stmt->close();
} else {
    echo "Invalid request!";
}

// Close connection
$conn->close();
?>
