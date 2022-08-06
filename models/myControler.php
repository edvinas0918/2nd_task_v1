<?php
include "./controlers/UserControler.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save'])) { 
        session_start();
        $err = 0;
        // ----------------------------VALIDATION FOR NAME---------------------------------------------//       
        if (empty($_POST['name'])) {                                              
            $_SESSION['errName'][] = "You didn't enter the name<br>";
            $err++;
        }       
        if (!preg_match("/^[a-zA-Z Ą ą Č č Ę ę Ė ė Į į Š š Ų ų Ū ū Ž ž]*$/", $_POST['name'])) {
            $_SESSION['errName'][] = "Your name should be just letters<br>";
            $err++;
        }
        
        // ----------------------------VALIDATION FOR LOT_NAME---------------------------------------------//
        if (empty($_POST['surname'])) {                                          
            $_SESSION['errSurname'][] = "You didn't enter the surname<br>";
            $err++;

        }
        if (!preg_match("/^[a-zA-Z]*$/", $_POST['surname'])) {
            $_SESSION['errSurname'][] = "Your lot_name should be just letters<br>";
            $err++;

        }

        // -------------------------------VALIDATION FOR AGE-----------------------------------------------//
        if (empty($_POST['age'])) {                                              //is not empty//
            $_SESSION['errAge'][] = "You didn't enter the age<br>";
            $err++;

        }
        if (!preg_match("/^[0-9]*$/", $_POST['age'])) {                         //is not a letter//
            $_SESSION['errAge'][] = "Your age should be just numbers<br>";
            $err++;

        }
        
        // ----------------------------VALIDATION FOR HEIGHT---------------------------------------------//        
        if (empty($_POST['height'])) {                                           //is not empty//
            $_SESSION['errHeight'][] = "You didn't enter the height<br>";
            $err++;

        }
        if (!preg_match("/^[0-9]*$/", $_POST['height'])) {                      //is not a letter//
            $_SESSION['errHeight'][] = "Your height should be just numbers<br>";
            $err++;

        }

        // =====================================OR RANGE=================================================//
            /// ADAPT IT ///
        
        $length = strlen($_POST['name']);
        if ($length < 5) {
            $_SESSION['err'][] = 'Too short';
        } else if ($length > 10) {
            $_SESSION['err'][] = 'Too long';
        } 

        // ----------------------------TAIL OF FUNCTION---------------------------------------------//
        
        if ($err == 0) {
            UserControler::store();}
        
            header("Location:" . $_SERVER['REQUEST_URI']);
        die;
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
