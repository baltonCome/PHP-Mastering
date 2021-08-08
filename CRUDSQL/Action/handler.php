<?php

session_start();

    require_once __DIR__ . "/../Controllers/databaseControl.php";
    require_once __DIR__ . "/../Core/config.php";

    function secure_and_clean($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function valid_data($name, $email){

        if (preg_match("/^[a-zA-Z ]*$/",$name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }

    if(isset($_POST["add_btn"])){

        if(valid_data($_POST['name'],$_POST['email'])){
            if(secure_and_clean(insert($pdo, $_POST['name'], $email = $_POST["email"]))){
                $_SESSION['report'] = 'Sucessfuly added';
                header('Location: ../Views/index.php?');
            }else{
                $_SESSION['report'] = 'Something went wrong';
                header('Location: ../Views/index.php?');
            }
        }else{
            echo "Invalid input";
        }
    }

    if(isset($_POST["update"])){

        if(valid_data($_POST['name'],$_POST['email'])){
            if(secure_and_clean(update($pdo, $_POST['id'], $_POST['name'], $_POST['email']))){
                $_SESSION['report'] = 'Sucessfuly Updated';
                header('Location: ../Views/index.php?');
            }else{
                $_SESSION['report'] = 'Something went wrong';
                header('Location: ../Views/index.php?');
            }
        }else{
            echo "Invalid input";
        }
    }

    if(isset($_GET["id"])){
    ?>  
        <script>
            let conf = window.prompt(`Do you really want to delete? Type ['yes'] to confirm!, `);
            if (conf.toLowerCase() == "yes"){
                <?php
                    if(secure_and_clean(delete($pdo, $_GET["id"]))){
                        $_SESSION['report'] = 'Sucessfuly Deleted';
                        header('Location: ../Views/index.php?');
                    }else{
                        $_SESSION['report'] = 'Something went wrong';
                        header('Location: ../Views/index.php?');
                    }
                ?>
            }  
        </script>
    <?php
    }
?>