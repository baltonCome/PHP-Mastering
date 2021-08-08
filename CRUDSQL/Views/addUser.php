<?php
    include_once 'util/header.php';
?>
    
    <div id= 'content'>
        <div id = 'title'>
            <h1>ADD USER</h1>
        </div>

        <form action="../Action/handler.php" method = "POST">
            <input placeholder="Name" type="text" name="name" id="name" class="user-info">
            <input placeholder="Email" type="text" name="email" id="email" class="user-info">

            <button id="save" name= "add_btn" class = "btn" type = "submit"> SAVE </button>
        </form>
        <a href="index.php"> <button id="back" class = "btn"> BACK </button> </a> 
    </div>
<?php
    include_once 'util/footer.php';
?>