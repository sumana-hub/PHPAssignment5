<?php
require('../model/database.php');
require('../model/customer_db.php'); 
include('../includes/header.php');

// Get customerID from GET request (for viewing/updating) and validate it
$customerID = filter_input(INPUT_GET, 'customerID', FILTER_VALIDATE_INT);
$customer = [];

if ($customerID) {
    // Fetch customer data from the database based on customerID
    $customer = get_customer_by_id($customerID);
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>View/Update Customer</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<header>
    <h1>SportsPro Technical Support</h1> 
    <p>Sports management software for the sports enthusiast</p> 
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li> 
        </ul>
    </nav>
</header>

<main>
<h1><?php echo isset($customerID) ? 'Update Customer' : 'Add New Customer'; ?></h1>

<!-- Form to add or update customer details -->
<form action="<?php echo isset($customerID) ? 'update_customer.php' : 'add_customer.php'; ?>" method="post">
    <?php if (isset($customerID)) : ?>
        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
    <?php endif; ?>
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" value="<?php echo isset($customer['firstName']) ? htmlspecialchars($customer['firstName']) : ''; ?>" required><br>
    </br>
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" value="<?php echo isset($customer['lastName']) ? htmlspecialchars($customer['lastName']) : ''; ?>" required><br>
    </br>
    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo isset($customer['address']) ? htmlspecialchars($customer['address']) : ''; ?>" required><br>
    </br>
    <label for="city">City:</label>
    <input type="text" name="city" value="<?php echo isset($customer['city']) ? htmlspecialchars($customer['city']) : ''; ?>" required><br>
    </br>
    <label for="state">State:</label>
    <input type="text" name="state" value="<?php echo isset($customer['state']) ? htmlspecialchars($customer['state']) : ''; ?>" required><br>
    </br>
    <label for="postalCode">Postal Code:</label>
    <input type="text" name="postalCode" value="<?php echo isset($customer['postalCode']) ? htmlspecialchars($customer['postalCode']) : ''; ?>" required><br>
    </br>
    <label for="countryCode">Country Code:</label>
    <input type="text" name="countryCode" value="<?php echo isset($customer['countryCode']) ? htmlspecialchars($customer['countryCode']) : ''; ?>" required><br>
    </br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="<?php echo isset($customer['phone']) ? htmlspecialchars($customer['phone']) : ''; ?>" required><br>
    </br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo isset($customer['email']) ? htmlspecialchars($customer['email']) : ''; ?>" required><br>
    </br>
    <label for="password">Password:</label>
    <input type="password" name="password" value="<?php echo isset($customer['password']) ? htmlspecialchars($customer['password']) : ''; ?>" required><br>
    </br>
    <input type="submit" value="<?php echo isset($customerID) ? 'Update Customer' : 'Add Customer'; ?>">
</form>

<p><a href="index.php">Back to Search Customers</a></p>
</main>

<?php include("../view/footer.php"); ?> 
</body>
</html>
