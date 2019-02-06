
<?php
    include ('../template/header.php');
    if(isset($_POST['uc'])) {
        $model = new \ModernWays\FricFrac\Model\Role();
        $model->setAddress1($_POST['Address1']);
        \ModernWays\FricFrac\Dal\Role::create($model->toArray());
    }
?>
<main>
    <article>
        <header>
        <nav>
            <button type="submit" name="uc" value="insert" form="form">Insert</button>
            <a href="Index.php">Annuleren</a>
        </nav>
        </header>
        <form id="form" action="" method="POST">
            <div>
                <label for="Address1">Name</label>
                <input type="text" required id="Address1" name="Address1"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>