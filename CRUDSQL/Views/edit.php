<?php
    include_once 'util/header.php';
    require_once __DIR__ . '/../Controllers/databaseControl.php';
    if(isset($_GET['id'])){
        $element = getSelected($pdo, $_GET['id']);
    }
?>
    
    <div id= 'content'>
        <div id = 'title'>
            <h1>UPDATE USER</h1>
        </div>

        <form action="../Action/handler.php" method = "POST">
            <input name="id" type="hidden" value ="<?php echo $element['id'] ?>" >
            <input placeholder="Name" type="text" name="name" id="name" value ="<?php echo $element['firstname'] ?>" class="user-info">
            <input placeholder="Email" type="text" name="email" id="email" value ="<?php echo $element['email'] ?>" class="user-info">

            <button id="update" name= "update" class = "btn" type = "submit"> UPDATE </button>
        </form>
        <a href="index.php"> <button id="back2" class = "btn"> BACK </button> </a> 
    </div>
<?php
    include_once 'util/footer.php';
?>