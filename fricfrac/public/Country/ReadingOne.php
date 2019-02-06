<?php
	include_once '../template/header.php';
	$id = $_GET['Id'];
	$model = new \ModernWays\FricFrac\Model\Country();
	$model->arrayToObject(\ModernWays\FricFrac\Dal\Country::readOneById($id));
	if(isset($_POST['uc'])){
		if($_POST['uc'] == 'delete'){
			\ModernWays\FricFrac\Dal\Country::delete($id);
	
    }
			header("Location: Index.php");
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
                <label for="Name">Naam</label>
                <input type="text" readonly id="Name" name="Name" 
                    value="<?php echo $model->getName();?>"/>
            </div>
             <div>
                <label for="Code">Code</label>
                <input type="text" readonly id="Code" name="Code" 
                    value="<?php echo $model->getCode();?>"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>