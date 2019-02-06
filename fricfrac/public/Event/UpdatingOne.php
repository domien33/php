
<?php
    include ('../template/header.php');
    $categoryList = \ModernWays\FricFrac\Dal\EventCategory::readAll();
    $topicList = \ModernWays\FricFrac\Dal\EventTopic::readAll();
    $id = $_GET['Id'];
    $model = new \ModernWays\FricFrac\Model\Event();
    $model->arrayToObject(\ModernWays\FricFrac\Dal\Event::readOneById($id));

    
    if(isset($_POST['uc'])) {
        $model->setId($id);
        $model->setName($_POST['Name']);
        $model->setLocation($_POST['Location']);
        $model->setImage($_POST['Image']);
        $model->setStarts($_POST['StartDate'] . ' ' .$_POST['StartTime']);
        $model->setEnds($_POST['EndDate'] . ' ' .$_POST['EndTime']);
        $model->setDescription($_POST['Description']);
        $model->setOrganiserName($_POST['OrganiserName']);
        $model->setOrganiserDescription($_POST['OrganiserDescription']);
        $model->setEventCategoryId($_POST['EventCategoryId']);
        $model->setEventTopicId($_POST['EventTopicId']); 

        \ModernWays\FricFrac\Dal\Event::update($model->toArray());

    }
?>
<main>
    <article>
        <header>
        <nav>
            <button type="submit" name="uc" value="insert" form="form">Update</button>
            <a href="ReadingOne.php?Id=<?php echo $id;?>">Terug naar event</a>
        </nav>
        </header>
        <form id="form" action="" method="POST">
            <div>
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" 
                    value="<?php echo $model->getName();?>"/>
            </div>
             <div>
                <label for="Location">Plaats</label>
                <input type="text" id="Location" name="Location" 
                    value="<?php echo $model->getLocation();?>"/>
            </div>
             <div>
                <label for="StartTime">Starttijd</label>
                <input type="time"  id="StartTime" name="StartTime" 
                    value="<?php echo $model->getStartTime();?>"/>
            </div>           
            <div>
                <label for="StartDate">Startdatum</label>
                <input type="date"  id="StartDate" name="StartDate" 
                    value="<?php echo $model->getStartDate();?>"/>
            </div>           
             <div>
                <label for="EndTime">Einde</label>
                <input type="time"  id="EndTime" name="EndTime" 
                    value="<?php echo $model->getEndTime();?>"/>
            </div>           
            <div>
                <label for="EndDate">Einddatum</label>
                <input type="date"  id="EndDate" name="EndDate" 
                    value="<?php echo $model->getEndDate();?>"/>
            </div>              <div>
                <label for="Image">Afbeelding</label>
                <input type="text"  id="Image" name="Image" 
                    value="<?php echo $model->getImage();?>"/>
            </div>     
             <div>
                <label for="Description">Beschrijving</label>
                <input type="text" required id="Description" name="Description" 
                    value="<?php echo $model->getDescription();?>"/>
            </div>    
             <div>
                <label for="OrganiserName">Naam organisator</label>
                <input type="text" required id="OrganiserName" name="OrganiserName" 
                    value="<?php echo $model->getOrganiserName();?>"/>
            </div>                
            <div>
                <label for="OrganiserDescription">Beschrijving organisator</label>
                <input type="text"  id="OrganiserDescription" name="OrganiserDescription" 
                    value="<?php echo $model->getOrganiserDescription();?>"/>
            </div>   
            <div>
                <label for="EventCategoryId">Event categorie</label>
                <select id="EventCategoryId" name="EventCategoryId" >
                    <!-- option elementen -->
                    <?php
                    if ($categoryList) {
                        foreach ($categoryList as $row) {
                    ?>
                    <option value="<?php echo $row['Id'];?>" 
                        <?php echo $model->getEventCategoryId() === $row['Id'] ? 'SELECTED' : '';?>>
                        <?php echo $row['Name'];?>
                    </option>
                    <?php
                        }
                    }
                    ?>                
                </select>
            </div>
              <div>
                <label for="EventTopicId">Event topic</label>
                <select id="EventTopicId" name="EventTopicId" >
                    <!-- option elementen -->
                    <?php
                    if ($topicList) {
                        foreach ($topicList as $row) {
                    ?>
                    <option value="<?php echo $row['Id'];?>"
                        <?php echo $model->getEventTopicId() === $row['Id'] ? 'SELECTED' : '';?>>
                        <?php echo $row['Name'];?>
                    </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
                      
            </form>
        <div id="feedback"></div>

    </article>
    <?php include('ReadingAll.php');?>
</main>
<?php include('../template/footer.php');?>