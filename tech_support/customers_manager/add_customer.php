<?php
session_start(); 

require('../model/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $countryCode = $_POST['countryCode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate required fields
    if (!empty($firstName) && !empty($lastName) && !empty($email)) {
        
        // Insert customer into the database
        $query = "INSERT INTO customers (firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password)
                  VALUES (:firstName, :lastName, :address, :city, :state, :postalCode, :countryCode, :phone, :email, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postalCode', $postalCode);
        $statement->bindValue(':countryCode', $countryCode);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();

        // Set a success message in the session
        $_SESSION['message'] = "Customer added successfully!";
        
        // Redirect to the customer search page
        header("Location: index.php");
        exit();  
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
