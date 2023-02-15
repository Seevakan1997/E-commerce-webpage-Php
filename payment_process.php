<?php
session_start();
include('server.php');

// Get the form data
$product_id = $_POST['product_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$card_number = $_POST['card_number'];
$card_holder = $_POST['card_holder'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];
$user_id = (int)$_SESSION['userID'];

// Sanitize and validate the form data
$product_id = mysqli_real_escape_string($db, $product_id);
$name = mysqli_real_escape_string($db, $name);
$price = mysqli_real_escape_string($db, $price);
$quantity = mysqli_real_escape_string($db, $quantity);
$card_number = mysqli_real_escape_string($db, $card_number);
$card_holder = mysqli_real_escape_string($db, $card_holder);
$expiry_date = mysqli_real_escape_string($db, $expiry_date);
$cvv = mysqli_real_escape_string($db, $cvv);

$errors = array();

if (empty($card_number)) {
    $errors[] = "Card number is required";
}
if (empty($card_holder)) {
    $errors[] = "Card holder name is required";
}
if (empty($expiry_date)) {
    $errors[] = "Expiry date is required";
}
if (empty($cvv)) {
    $errors[] = "CVV is required";
}
if (!preg_match("/^[0-9]{3,4}$/", $cvv)) {
    $errors[] = "CVV must be a 3 or 4 digit number";
}

if (!empty($errors)) {
    $_SESSION['error'] = implode("<br>", $errors);
    header("Location: payment.php?product_id=$product_id&name=$name&price=$price&quantity=$quantity");
    exit;
}
// Delete the purchased product from user_orders table
$query = "DELETE FROM user_cart WHERE user_id=$user_id AND product_id=$product_id LIMIT 1";
mysqli_query($db, $query);

if (mysqli_affected_rows($db) != 1) {
    $_SESSION['error'] = "Failed to remove purchased product from cart. Please try again.";
    header("Location: payment.php?product_id=$product_id&name=$name&price=$price&quantity=$quantity");
    exit;
}
// Insert the payment information into the database
$query = "INSERT INTO oders (user_id, product_id, name, price, quantity, card_number, card_holder, expiry_date, cvv, payment_completed)
VALUES ('$user_id', '$product_id', '$name', '$price', '$quantity', '$card_number', '$card_holder', '$expiry_date', '$cvv', '1')";

if (mysqli_query($db, $query)) {
    // Payment completed successfully
    $_SESSION['success'] = "Payment completed successfully!";
    $_SESSION['purchase_complete'] = true;

    // Redirect to confirmation page
    header("Location: my_oders.php");
    exit;
} else {
    // Payment failed
    $_SESSION['error'] = "Payment failed. Please try again.";

    // Redirect to payment page
    header("Location: payment.php?product_id=$product_id&name=$name&price=$price&quantity=$quantity");
    exit;
}
