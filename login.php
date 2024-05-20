<?php
// Start the session
session_start();

// Include the database connection file
include('connect.php');

// Get the values from POST data
$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$std = $_POST['std'];

// Check if the user exists
$sql = "SELECT * FROM userdata WHERE username='$username' AND mobile='$mobile' 
AND password='$password' AND standard='$std'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0) {
    // Fetch user data
    $data = mysqli_fetch_array($result);

    // Fetch group data
    $sql_group = "SELECT username, photo, votes, id FROM userdata WHERE standard='group'";
    $result_group = mysqli_query($con, $sql_group);

    if(mysqli_num_rows($result_group) > 0) {
        $groups = mysqli_fetch_all($result_group, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
    }

    // Store user session data
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;

    // Redirect to dashboard
    header("Location: ../partials/dashboard.php");
    exit; // Ensure no further execution after redirection
} else {
    // Invalid credentials, redirect to login page
    echo '<script>
    alert("Invalid credentials");
    window.location="../";
    </script>';
}
?>
