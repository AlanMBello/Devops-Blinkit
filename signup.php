<?php
// Include database configuration
include_once 'dbconfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert user data into database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        // Redirect to login page
        header("Location: login.html");
        exit(); // Make sure to exit after the redirect to prevent further execution
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Username</label>
    <input type="text" name="username" required><br>
    <label>Email</label>
    <input type="email" name="email" required><br>
    <label>Password</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="signup" value="Sign Up">
</form>
