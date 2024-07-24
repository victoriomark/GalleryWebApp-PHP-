<?php
session_start();
if(!$_SESSION['Email']){
    header('Location: ../Login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/d4532539ca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!--    cdn for fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!--    ajax cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Home</title>
</head>
<style>

    body{
        background-color: rgba(32, 41, 64, 1);
        font-family: "Prompt", sans-serif;
        font-weight: 500;
        font-style: normal;
        color: #D9DDEC;
    }
    i{
        color: #20c997;
    }

    #image{
        object-fit: cover;
        height: 20vh;
        transition: 0.5s;
    }
    #image:hover{
        transform: scale(1.06);
    }

    .modal{
        /* From https://css.glass */
        background: rgba(255, 255, 255, 0);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(3.7px);
        -webkit-backdrop-filter: blur(3.7px);
        border: 1px solid rgba(255, 255, 255, 1);
    }

#uploadAlb_img{
     border: #20c997 dotted;
    padding: 10px;
}
.card{
    cursor: pointer;
}
</style>
<body>
<header class="d-flex container-fluid justify-content-between align-items-center p-3">

    <?php
    $conn = mysqli_connect('sql108.infinityfree.com','if0_36676265','CzdXppFAt08jk','if0_36676265_galleryapp');
    if(!$conn){
        die('<h1 class="text-danger">Connection Problem</h1>');
    }

    $Email = $_SESSION['Email'];
    $result = $conn->query("SELECT FullName FROM users WHERE Email = '$Email'");
    $user = $result->fetch_assoc();
?>
    <h1>
        <i class="fa-solid fa-camera-retro"></i>
        <?= "Hi <span class='fw-3'>" . htmlspecialchars($user['FullName'], ENT_QUOTES, 'UTF-8') . "</span class='fw-3'>" ?>
    </h1>
    <?php

    ?>

    <form id="form_logout" action="../Auth/Logout.php" class="d-flex gap-2 justify-content-center align-items-center">
        <button class="btn" id="GettingLogout">
            <i class="fa-solid  fa-arrow-right-from-bracket"></i>
        </button>
    </form>
</header>

<section class="container-fluid p-5">
    <button style="background-color:#20c997; color: #ffffff" class="btn" data-bs-toggle="modal" data-bs-target="#CreateAlbum">Create Album</button>
</section>

<main class="container row justify-content-center align-items-center gap-3 p-5">

    <?php
    $email = $_SESSION['Email'];
    $Query = "SELECT Title,UserEmail,Image,Id
        FROM album
         INNER JOIN users ON
             UserEmail = users.Email
         where UserEmail = ?";

    $stmt = $conn->prepare($Query);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            ?>
            <!--    card start-->
            <div style="background-color: #D9DDEC" class="card border-0 col-lg-3 col-md-4 p-3">
                <img class="card-img"  id="image" src="../Model/uploadAlbum/<?= $row['Image'] ?>" alt="image">
                <div class="card-body">
                    <h2 id="Title_"><?= $row['Title'] ?></h2>
                </div>

                <!-- list item-->
                <div>
                    <button id="btn_del" name="btn_del" value="<?= $row['Id'] ?>" class="btn">
                        <i id="btn_del" class="fa-solid fa-trash-can"></i>
                    </button>
                    <button id="Edit_btn" value="<?= $row['Id'] ?>" class="btn">
                        <i  class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button id="open_" value="<?= $row['Id'] ?>"  class="btn">
                        <i id="open_" class="fa-regular fa-folder-open"></i>
                    </button>
                </div>

            </div>
            <!--    end start-->
    <?php
        }
    }else{
        echo "
        <img class='col-lg-4' src='../Assets/createAlbumsvg.svg' alt='image'>
     
        ";
    }

    ?>

</main>


<!-- Modal for adding album -->
<div class="modal fade" id="CreateAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark " id="success_Message">Create Album</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_adding_album" action="../Model/CreateAlbum.php" class="modal-body d-flex flex-column gap-3 text-dark">

                <div>
                    <label for="Title">Title</label>
                    <input class="form-control" type="text" id="Title" placeholder="Title..">
                    <div id="title-msg" class="invalid-feedback">
                    </div>
                </div>

                <div>
                    <input accept="image/png/jpg" class="form-control" type="file" id="uploadAlb_img">
                    <div id="useUpload" class="invalid-feedback">
                    </div>
                </div>
                <div class="modal-footer">
                    <button  id="create_btn" style="background-color: #20c997;" type="submit" class="btn text-light">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal for confirm Del -->
<div class="modal fade" id="ConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 id="message" class="text-dark">Please Confirm</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button id="ConfirmDel" style="background-color:  #20c997" type="button" class="btn text-light">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<div id="data_con">

</div>

<div id="test">

</div>
<script src="../MainJs/index.js"></script>
</body>
</html>