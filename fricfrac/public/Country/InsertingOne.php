
<?php
    include ('../template/header.php');
    if(isset($_POST['uc'])) {
        $model = new \ModernWays\FricFrac\Model\Country();
        $model->setName($_POST['name']);
        $model->setCode($_POST['code']);
        \ModernWays\FricFrac\Dal\Country::create($model->toArray());
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
                <label for="name">Naam</label>
                <input type="text" required id="name" name="name"/>
            </div>
             <div>
                <label for="code">Code</label>
                <input type="text" required id="code" name="code"/>
            </div>
       </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>