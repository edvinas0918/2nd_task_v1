<?php
//================= backend =================
include "./controlers/UserControler.php";


//====issaugojimas====
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save'])) {
        UserControler::store();
    }

    if (isset($_POST['edit'])) {
        $user = UserControler::show();
    }

    if (isset($_POST['update'])) {
        UserControler::update();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }

    if (isset($_POST['destroy'])) {
        UserControler::destroy();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }
}

$users = UserControler::index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main>
        <!----- INPUT ----->
        <div id="inputTable">
            <h2 style="text-align: center; padding-top: 15px">Registration field</h2>
            <form action="" method="post" id="input">
                <div class="form-group col-md-4">
                    <label style="margin-top: 10px">
                        <h5>Name</h5>
                        <input type="text" class="form-control" name="name" <?= isset($_POST['edit']) ? 'value="' . $user->name . '"' : "" ?>">
                    </label>
                </div>
                <div class="form-group col-md-4">
                    <label style="margin-top: 10px">
                        <h5>Surname</h5>
                        <input type="text" class="form-control" name="surname" <?= isset($_POST['edit']) ? 'value="' . $user->surname . '"' : "" ?>>
                    </label>
                </div>

                <?= isset($_POST['edit']) ? '<input type="hidden" name="id" value="' . $user->id . '">' : "" ?>
                <button style="margin-top: 10px" type="submit" class="save btn btn-primary " name=<?= isset($_POST['edit']) ? '"update" >Update' : '"save" >Save' ?> </button>
            </form>
            <button style="margin-left: 33%; margin-bottom: 10px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                See all list of participants
            </button>
        </div>
      <?php include "./models/myModalOut.php";?> <!-- OUTPUT -->

    </main>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>