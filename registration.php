<?php
// Include the database configuration file
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $height = $_POST['height'];
    $weight = $_POST['weight'];


    // Prepare and execute the SQL statement
    $sql = "INSERT INTO users (name, gender, age, email, password, height, weight) 
            VALUES (:name, :gender, :age, :email, :password, :height, :weight)";
    
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':weight', $weight);
    

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>


