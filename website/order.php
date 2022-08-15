<?php
$db = mysqli_connect("localhost", "root", "");
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Create Databse if do not exist
$query = "CREATE DATABASE if not exists payment_records";
if(mysqli_query($db, $query)){

    //Create a connection with the databse payment_records
    $conn = mysqli_connect("localhost", "root", "", "payment_records");
 
    // Check the connection went through
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //
    $table = "CREATE TABLE records(
                Name text,
                Credit_Card INT(16),
                CVV INT(4),
                EXP_Date VARCHAR(5),
                Address VARCHAR(200),
                Phone_Number VARCHAR(15),
                Description VARCHAR(200),
                Cheesy_Nachos INT,
                Fries INT,
                Chicken_Nuggets INT,
                Chocolate_Lava_Cake INT,
                Mango_Pudding INT,
                Vanilla_Ice_Cream INT,
                Chocolate_Milkshake INT,
                Ice_Lemon_Tea INT,
                Black_Coffee INT,
                Total_Price VARCHAR(50)

    )";

    mysqli_query($conn, $table);
    

    mysqli_close($conn);
}
 
 
// Close connection
mysqli_close($db);



//###########################################################################
// Connecting to the databse in mysql
//###########################################################################



//connecting to a mysqli server
$link = mysqli_connect("localhost", "root", "", "payment_records");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$person_name = $_POST['Person_name'];
$credit_card = $_POST['Credit_card'];
$cvv = $_POST['Cvv'];
$month = $_POST['Expiration_date'];
$year = $_POST['Expiration_date2'];
$date = $month."/".$year;
$address = $_POST['Address'];
$phone_number = $_POST['Phone_number'];
$description = $_POST['Desc'];

$first_snack = $_POST['First_Snack'];
$second_snack = $_POST['Second_Snack'];
$third_snack = $_POST['Third_Snack'];

$first_desert = $_POST['First_Desert'];
$second_desert = $_POST['Second_Desert'];
$third_desert = $_POST['Third_Desert'];


$first_beverage = $_POST['First_Beverage'];
$second_beverage = $_POST['Second_Beverage'];
$third_beverage = $_POST['Third_Beverage'];


/* To calculate the total price */ 
$price = [10.00,5.00,5.00,6.90,5.00,4.00,4.50,3.90,5.90];// PRICE OF EACH SNACK IN ORDER

$quantity = [$first_snack,$second_snack,$third_snack,$first_desert,$second_desert,$third_desert,$first_beverage,$second_beverage,$third_beverage];// QUANTITY OF EACH SNACK IN ORDER

$sum = 0;
for($i = 0;  $i < 9; $i++){
    $sum += $price[$i] * $quantity[$i];
}

// Put a number format of 2 decimal places.
$total = number_format($sum, 2);



// Attempt insert query execution
$sql = "INSERT INTO records (Name,Credit_Card,CVV,EXP_Date,Address,Phone_Number,Description, Cheesy_Nachos, Fries, Chicken_Nuggets, Chocolate_Lava_Cake, Mango_Pudding, Vanilla_Ice_Cream, Chocolate_Milkshake, Ice_Lemon_Tea, Black_Coffee,Total_Price) VALUES ('$person_name','$credit_card','$cvv','$date','$address','$phone_number','$description','$first_snack','$second_snack','$third_snack','$first_desert','$second_desert','$third_desert','$first_beverage','$second_beverage','$third_beverage','RM $total')";

if(mysqli_query($link, $sql)){
    
    echo"<script>window.location.href='order.html';</script>";

} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);
?>


