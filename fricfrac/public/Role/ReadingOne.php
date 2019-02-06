<?php
    include ('../template/header.php');
    $id = $_GET['Id'];
    $model = new \ModernWays\FricFrac\Model\Role();
    $model->arrayToObject(\ModernWays\FricFrac\Dal\Role::readOneById($id));
    
   if(isset($_POST['uc'])) {
       if ($_POST['uc'] == 'delete') {
            \ModernWays\FricFrac\Dal\Role::delete($id);
            header("Location: Index.php");
       }
    }    
?>
<main>
    <article>
        <header>
        <nav>
            <a href="UpdatingOne.php?Id=<?php echo $model->getId();?>">Updating</a>
            <a href="InsertingOne.php">Inserting</a>
            <button type="submit" name="uc" value="delete" form="form">Delete</button>
           <a href="Index.php">Annuleren</a>
        </nav>
        </header>
        <form id="form" action="" method="POST">
            <div>
                <label for="Address1">Name</label>
                <input type="text" readonly id="Address1" name="Address1" 
                    value="<?php echo $model->getAddress1();?>"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>