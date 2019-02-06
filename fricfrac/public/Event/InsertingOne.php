<?php
    include ('../template/header.php');
    
    $categoryList = \ModernWays\FricFrac\Dal\EventCategory::readAll();
    $topicList = \ModernWays\FricFrac\Dal\EventTopic::readAll();
    
    if(isset($_POST['uc'])) {
        $model = new \ModernWays\FricFrac\Model\Event();
        $model->setName($_POST['Name']);
        $model->setLocation($_POST['Location']);
        $model->setStarts($_POST['StartDate'] . ' ' .$_POST['StartTime']);
        $model->setEnds($_POST['EndDate'] . ' ' .$_POST['EndTime']);
        $model->setImage($_POST['Image']);
        $model->setDescription($_POST['Description']);
        $model->setOrganiserName($_POST['OrganiserName']);
        $model->setOrganiserDescription($_POST['OrganiserDescription']);
        $model->setEventCategoryId($_POST['EventCategoryId']);
        $model->setEventTopicId($_POST['EventTopicId']);

        \ModernWays\FricFrac\Dal\Event::create($model->toArray());
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
            <div>
                <label for="Location">Plaats</label>
                <input type="text" required id="Location" name="Location"/>
            </div>
            
            <div>
                <label for="StartTime">Starttijd</label>
                <input type="time"  id="StartTime" name="StartTime"/>
            </div>           
            <div>
                <label for="StartDate">Startdatum</label>
                <input type="date"  id="StartDate" name="StartDate"/>
            </div>           
            <div>
                <label for="EndTime">Eindtijd</label>
                <input type="time"  id="EndTime" name="EndTime"/>
            </div>           
            <div>
                <label for="EndDate">Einddatum</label>
                <input type="date"  id="EndDate" name="EndDate"/>
            </div>
            
            <div>
                <label for="Image">Afbeelding</label>
                <input type="file" required id="Image" name="Image"/>
            </div>  
            
             <div>
                <label for="Description">Beschrijving</label>
                <input type="text" required id="Description" name="Description"/>
            </div>            
            <div>
                <label for="OrganiserName">Naam organisator</label>
                <input type="text" required id="OrganiserName" name="OrganiserName"/>
            </div>            
              <div>
                <label for="OrganiserDescription">Beschrijving organisator</label>
                <input type="text" required id="OrganiserDescription" name="OrganiserDescription"/>
            </div>
            
            <div>
                <label for="EventCategoryId">Category</label>
                <select id="EventCategoryId" name="EventCategoryId">
                    <?php
                        if ($categoryList) {
                            foreach ($categoryList as $row) {
                                echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="EventTopicId">Topic</label>
                <select id="EventTopicId" name="EventTopicId">
                    <?php
                        if ($topicList) {
                            foreach ($topicList as $row) {
                                echo '<option value=' . $row['Id'] . '>' . $row['Name'] . '</option>';
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