<?php
if(isset($_SESSION["user"])){
    $userId=$_SESSION["user"]["userId"];
    $upit="SELECT * FROM users WHERE userId=$userId";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetch(PDO::FETCH_ASSOC);




?>
    <title>Profile Page</title>
    <style>
        /* CSS for profile page layout */

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        .emp-profile {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .row {
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        #profile-picture {
            display: block;
            margin: 0 auto;
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="file"] {
            display: block;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            background-color: #9d9d9d;
            color: #fff;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-default {
            background-color: #f0f0f0;
            color: #333;
        }

    </style>
</head>
<body>
<div class="container emp-profile">

        <div class="row">
<h1 style="text-align: center">Profile Page</h1><br>

<!-- Profile Picture -->

 <div class="col-md-4">
<?php
if($rezultat["img"] != null){
    echo "<img src='{$rezultat["img"]}'id='profile-picture' alt='Profile Picture'>";
}
else{
    echo "<img src='assets/images/profilna.jpg' id='profile-picture' alt='Profile Picture' width='100' height='100'>";
}

?>

        <form action="models/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" class="btn btn-warning" name="profile-picture-upload" id="profile-picture-upload">
            <input type="hidden" name="user" value="<?= $rezultat["userId"]?>">
            <input type="submit" class="btn btn-default" value="Upload Picture" name="submit" style="background-color: #9d9d9d">
        </form>
</div>
<div class="col-md-4">
            <form action="models/update_profile.php" method="post">
                <label for="name">First Name:</label>
                <input type="text" name="Fname" id="Fname" value="<?=$rezultat["fisrtName"]?>"><br>
                <label for="name">Last Name:</label>
                <input type="text" name="Lname" id="Lname" value="<?=$rezultat["lastName"]?>"><br>
                <label for="name">Name:</label>
                <input type="text" name="Uname" id="Uname" value="<?=$rezultat["Username"]?>"><br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?=$rezultat["Email"]?>"><br>

                <input type="submit" id="abdejtuj" class="btn btn-default" value="Save Changes" name="submit">
            </form>
        </div>
        </div>
</div>
<?php
}
    ?>