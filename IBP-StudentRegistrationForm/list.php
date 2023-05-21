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
        if(x===" "){
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
                <a href="list.php">index Page</a>
            </li>
        </ol>
    </nav>
    <article>
        <table>
            <tr>
                <th>ID </th>
                <th>FULL NAME </th>
                <th>EMAİL </th>
                <th>GENDER </th>
            </tr>

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "verikaydetme_formdb";

        $connect = new mysqli($servername, $username, $password, $dbname);
        if ($connect->connect_error) {
            die("connect this database failed due to." . $connect->connect_error);
        }
        $sql = "select * from students";
        $result = $connect->query($sql);
        /*$rowdata= isset($rowdata['rowdata']);*/

        if($result -> num_rows> 0){
            while($rowdata = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $rowdata["id"] . "</td>";
                echo "<td>" . $rowdata["full_name"] . "</td>";
                echo "<td>" . $rowdata["email"]  . "</td>";
                echo "<td>" . $rowdata["gender"] . "</td>";
                echo "</tr>";
			}
        }
        ?>
</table>
    </article>
</section>

<footer>
    this is footer
</footer>

</body>
</html>

