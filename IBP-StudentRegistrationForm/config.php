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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    window.onload= function(){
        document.getElementById("full_name").focus();
    }
    function fun(){
        window.alert("kaydetme başarılı!...");
    }

    function validate(){
        let x = document.getElementById("full_name").value; /*validate fonksiyonu fname boşsa bir uyarı mesajı döndürür ve formun gönderilmesini önler. */
        if(x==""){
            alert("name should be filled");
            return false;
        }
    }
</script>
<body>

<header>
    <span onclick="this.innerHTML='IBP'">Student Registration Form with Database Integration</span><br>
    <span id="tt" onclick="fun()"></span>
</header>

<script>
    document.getElementById("tt").innerHTML= "irem erdoğan";
    document.getElementById("tt").style.border="1px solid brown";
</script>

<section>
    <nav>
        <ol>
            <li>
                <a href="index-form.html">form Page</a>
            </li>
            <li>
                <a href="registration-form.php">index Page</a>
            </li>
        </ol>
    </nav>
    <article>
        <div class="container">
            <legend style="text-align: end">Designed by İREM ERDOĞAN</legend><br>

            <form action="registration-form.php" onsubmit="return validate()" method="post">
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
                        <input type="submit" value="submit">
                    </div>
                </div>
            </form>

        </div>

    </article>
</section>

<footer>
    this is footer
</footer>

</body>
</html>
