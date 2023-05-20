<html>
<head>
	<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<script>
    function fun(){
        window.alert("kaydetme başarılı!...");
    }

</script>
<body>
<div>
    <?php

    if(isset($_POST['create'])) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "verikaydetme_formdb";

        $connect = new mysqli($servername, $username, $password, $dbname);

        if ($connect->connect_error) {
            die("connect this database failed due to." . $connect->connect_error);
        }

        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "insert into students(full_name, email, gender) VALUES ('$full_name', '$email', '$gender');";

        if ($connect->query($sql) == true) {
            echo "you are successfully registered.";
            header('location:list.php');
        } else {
            echo "error: $sql <br> $connect->error";
        }

        $connect->close();

    }
    ?>

</div>

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
                        <span class="message"></span>

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
                        <input type="submit" name="create" value="submit">
                    </div>
                </div>

            </form>
</body>

</html>