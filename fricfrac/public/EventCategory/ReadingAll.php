<?php
    $eventCategoryList = \ModernWays\FricFrac\Dal\EventCategory::readAll();
?>

<aside>
    <table>
        <?php
            foreach($eventCategoryList as $eventCategoryItem) {
                echo '<tr>';
                echo '<td><a href="ReadingOne.php?Id=' . $eventCategoryItem['Id'] . '">-></a></td>';
                echo '<td>' . $eventCategoryItem['Name'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</aside>

<?php    
    
?>