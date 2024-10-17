<?php
require('database.php');

// Function to get customers by last name
function get_customers_by_lastname($lastName) {
    global $db;
    $query = 'SELECT * FROM customers WHERE lastName = :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

// Function to get customer by ID
function get_customer_by_id($customerID) {
    global $db;
    $query = 'SELECT * FROM customers WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

// Function to update customer information
function update_customer($customerID, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :firstName, lastName = :lastName, address = :address,
                  city = :city, state = :state, postalCode = :postalCode, 
                  countryCode = :countryCode, phone = :phone, email = :email, password = :password
              WHERE customerID = :customerID';
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
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}

// Function to add a new customer
function add_customer($firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO customers (firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password)
              VALUES (:firstName, :lastName, :address, :city, :state, :postalCode, :countryCode, :phone, :email, :password)';
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
}
?>
