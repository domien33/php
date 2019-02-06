<?php
    include ('../template/header.php');
    $id = $_GET['Id'];
    $model = new \ModernWays\FricFrac\Model\Country();
    $model->arrayToObject(\ModernWays\FricFrac\Dal\Country::readOneById($id));

   if(isset($_POST['uc'])) {
        $model->setName($_POST['Name']);
        $model->setCode($_POST['Code']);
        \ModernWays\FricFrac\Dal\Country::update($model->toArray());
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
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" 
                    value="<?php echo $model->getName();?>"/>
            </div>
             <div>
                <label for="Code">Code</label>
                <input type="text" required id="Code" name="Code" 
                    value="<?php echo $model->getCode();?>"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>