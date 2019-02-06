
<?php
    include ('../template/header.php');
    if(isset($_POST['uc'])) {
        $model = new \ModernWays\FricFrac\Model\EventTopic();
        $model->setName($_POST['Name']);
        \ModernWays\FricFrac\Dal\EventTopic::create($model->toArray());
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
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>