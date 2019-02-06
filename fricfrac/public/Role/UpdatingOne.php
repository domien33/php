<?php
    include ('../template/header.php');
    $id = $_GET['Id'];
    $model = new \ModernWays\FricFrac\Model\Role();
    $model->arrayToObject(\ModernWays\FricFrac\Dal\Role::readOneById($id));

   if(isset($_POST['uc'])) {
        $model->setAddress1($_POST['Address1']);
        \ModernWays\FricFrac\Dal\Role::update($model->toArray());
    }?>
<main>
    <article>
        <header>
        <nav>
            <button type="submit" name="uc" value="update" form="form">Update</button>
           <a href="Index.php">Annuleren</a>
        </nav>
        </header>
        <form id="form" action="" method="POST">
            <div>
                <label for="Address1">Naam</label>
                <input type="text" required id="Address1" name="Address1" 
                    value="<?php echo $model->getAddress1();?>"/>
            </div>

       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>