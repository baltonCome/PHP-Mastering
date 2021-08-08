<?php
    session_start();
    if(isset($_SESSION['report'])){
        $_SESSION['report'] = 'Sucessfuly added';
    }
    session_unset();
    include_once 'util/header.php';
?>

    <div id= 'content'>
        <div id = 'title'>
            <h1>USERS LIST</h1>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>DATE</th>
                <th></th>
                <th></th>
            </tr>
            <?php

            require_once __DIR__ . '/../Controllers/databaseControl.php';
            if(getAll($pdo)>0){
                foreach(getAll($pdo) as $key => $value){
            ?>        
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['firstname']?></td>
                        <td><?php echo $value['email']?></td>
                        <td><?php echo $value['reg_date']?></td>
                        <td><a href="edit.php?id=<?php echo $value['id'] ?>"> <button id = "edit" class = "btn"> Edit </button> </a> </td>
                        <td> <a href ="../Action/handler.php?id=<?php echo $value['id'] ?>"> <button id = "delete" class = "btn"> Delete </button> </a> </td>            
                    </tr>
                <?php
                }
            }else{
                ?>
                <tr>
                    <td>=</td>
                    <td>=</td>
                    <td>=</td>
                    <td>=</td>
                </tr>
            <?php
            }
            ?>
        </table>

        <a href="addUser.php"> <button id="add" class = "btn"> ADD </button> </a> 
    </div>

<?php
    include_once 'util/footer.php';
?>