<html>
<head>
	<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>
<?php
// Retrieve the form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$id = $_POST['id'];
$gender = $_POST['gender'];

// Perform validation on the data if needed

// Process the data
// Perform actions such as saving to a database, sending an email, etc.

// Example: Save the data to a database
// Assuming you have a database connection established
$servername = "localhost";
$username = "username";
$password = "password";
$verikaydetme_formdb = "database_name";

// Create a connection
$conn = new mysqli($servername, $username, $password, $verikaydetme_formdb);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query
$sql = "INSERT INTO form_data (full_name, email, id, gender) VALUES ('$full_name', '$id', '$email','$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Example: Send an email
$to = "recipient@example.com";
$subject = "New Form Submission";
$body = "full Name: $full_name\nEmail: $email\nid: $id";
$headers = "From: sender@example.com";

if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>

            <form action="registration-form.php" onsubmit="return validate()" method="post">
                <legend style="text-align: end">Designed by İREM ERDOĞAN</legend>
                <div class="row">
                    <div class="column-1">
                        <label>id:</label>
                    </div>
                    <div class="column-2">
                        <input type="text" name="id" required>
                        <span class="message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="column-1">
                        <label>Full name:</label>
                    </div>
                    <div class="column-2">
                        <input type="text" name="full_name" required>
                        <span class="message"></span>
                    </div>
                </div>

                    <div class="row">
                    <div class="column-1">
                    <label>Email Address:</label>
                    </div>
                    <div class="column-2">
                    <input type="email" name="email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column-1">
                        <label>Gender:</label>
                    </div>
                    <div class="column-2" style="margin-left: 80px">
                        <input type="radio" id="male" name="gender" value="Male" required>
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="Female" required>
                        <label for="female">Female</label><br>
                    </div>
                </div>

                <div class="row">
                    <div class="column-1">
                        <label></label>
                    </div>

                    <div class="column-2">
                        <input type="submit" value="submit">
                    </div>
                </div>

            </form>


</body>

</html>