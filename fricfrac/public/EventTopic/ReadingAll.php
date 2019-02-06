<?php
    $eventTopicList = \ModernWays\FricFrac\Dal\EventTopic::readAll();
?>

<aside>
    <table>
        <?php
            foreach($eventTopicList as $eventTopicItem) {
                echo '<tr>';
                echo '<td><a href="ReadingOne.php?Id=' . $eventTopicItem['Id'] . '">-></a></td>';
                echo '<td>' . $eventTopicItem['Name'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</aside>

<?php    
    
?>