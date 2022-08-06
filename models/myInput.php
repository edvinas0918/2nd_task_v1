<div id="inputTable">
    <h2 style="text-align: center; padding-top: 15px; color: blue">Put Your plant below</h2>
    <form action="" method="post" id="input">

        <div class="form-group col-md-4">
            <label style="margin-top: 10px">
                <h5>Name in LTU</h5>
                <input id="name" type="text" class="form-control" name="name" <?= isset($_POST['edit']) ? 'value="' . $user->name . '"' : "" ?>">
            </label>
        </div>
        <?php

        session_start();
        if (isset($_SESSION['errName'])) {
            echo "<div class='alert alert-primary' role='alert'>" . (implode($_SESSION['errName']) . "</div>");
        }
         ?>

        <div class="form-group col-md-4">
            <label style="margin-top: 10px">
                <h5>Name in LOT</h5>
                <input type="text" class="form-control" name="surname" <?= isset($_POST['edit']) ? 'value="' . $user->surname . '"' : "" ?>>
            </label>
        </div>
        <?php
        if (isset($_SESSION['errSurname'])) {
            echo "<div class='alert alert-primary' role='alert'>" . (implode($_SESSION['errSurname']) . "</div>");
        } ?>

        <fieldset>
            <legend>What the class of input?</legend>
            <label><input id="tree" type="radio" name="bool" value="1" checked> Tree</label>
            <label><input id="nottree" type="radio" name="bool" value="0"> Not Tree</label>
        </fieldset>

        <div class="form-group col-md-4">
            <label style="margin-top: 10px">
                <h5>Age</h5>
                <input type="integer" class="form-control" name="age" <?= isset($_POST['edit']) ? 'value="' . $user->age . '"' : "" ?>>
            </label>
        </div>

        <?php
        if (isset($_SESSION['errAge'])) {
            echo "<div class='alert alert-primary' role='alert'>" . (implode($_SESSION['errAge']) . "</div>");
        } ?>

        <div class="form-group col-md-4">
            <label style="margin-top: 10px">
                <h5>Height</h5>
                <input type="integer" class="form-control" name="height" <?= isset($_POST['edit']) ? 'value="' . $user->height . '"' : "" ?>>
            </label>
        </div>

        <?php
        if (isset($_SESSION['errHeight'])) {
            echo "<div class='alert alert-primary' role='alert'>" . (implode($_SESSION['errHeight']) . "</div>");
        }
        session_unset();
        ?>

        <?= isset($_POST['edit']) ? '<input type="hidden" name="id" value="' . $user->id . '">' : "" ?>
        <button style="margin-top: 10px" type="submit" class="save btn btn-primary " name=<?= isset($_POST['edit']) ? '"update" >Update' : '"save" >Save' ?> </button>
    </form>

    <button style="margin-left: 42%; margin-bottom: 10px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        See all list
    </button>
</div>