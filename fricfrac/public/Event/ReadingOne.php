
<?php
    include ('../template/header.php');
    $categoryList = \ModernWays\FricFrac\Dal\EventCategory::readAll();
    $topicList = \ModernWays\FricFrac\Dal\EventTopic::readAll();
    $id = $_GET['Id'];
    $model = new \ModernWays\FricFrac\Model\Event();
    $model->arrayToObject(\ModernWays\FricFrac\Dal\Event::readOneById($id));

?>
<main>
    <article>
        <header>
        <a href="UpdatingOne.php?Id=<?php echo $id;?>">Update</a>
        </header>
        <form id="form" action="" method="POST">
            <div>
                <label for="Name">Naam</label>
                <input type="text" required id="Name" name="Name" readonly
                    value="<?php echo $model->getName();?>"/>
            </div>
             <div>
                <label for="Location">Plaats</label>
                <input type="text" id="Location" name="Location" readonly
                    value="<?php echo $model->getLocation();?>"/>
            </div>
             <div>
                <label for="StartTime">Starttijd</label>
                <input type="time"  id="StartTime" name="StartTime" readonly
                    value="<?php echo $model->getStartTime();?>"/>
            </div>           
            <div>
                <label for="StartDate">Startdatum</label>
                <input type="date"  id="StartDate" name="StartDate" readonly
                    value="<?php echo $model->getStartDate();?>"/>
            </div>           
             <div>
                <label for="EndTime">Einde</label>
                <input type="time"  id="EndTime" name="EndTime" readonly
                    value="<?php echo $model->getEndTime();?>"/>
            </div>           
            <div>
                <label for="EndDate">Einddatum</label>
                <input type="date"  id="EndDate" name="EndDate" readonly
                    value="<?php echo $model->getEndDate();?>"/>
            </div>              <div>
                <label for="Image">Afbeelding</label>
                <input type="text"  id="Image" name="Image" readonly
                    value="<?php echo $model->getImage();?>"/>
            </div>     
             <div>
                <label for="Description">Beschrijving</label>
                <input type="text" required id="Description" name="Description" readonly
                    value="<?php echo $model->getDescription();?>"/>
            </div>    
             <div>
                <label for="OrganiserName">Naam organisator</label>
                <input type="text" required id="OrganiserName" name="OrganiserName" readonly
                    value="<?php echo $model->getOrganiserName();?>"/>
            </div>                
            <div>
                <label for="OrganiserDescription">Beschrijving organisator</label>
                <input type="text"  id="OrganiserDescription" name="OrganiserDescription" readonly
                    value="<?php echo $model->getOrganiserDescription();?>"/>
            </div>   
            <div>
                <label for="EventCategoryId">Event categorie</label>
                <select id="EventCategoryId" name="EventCategoryId" readonly>
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
                <select id="EventTopicId" name="EventTopicId" readonly>
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
<?php include('../template.footer.php');?>