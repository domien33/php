<?php
    $list = \ModernWays\FricFrac\Dal\Event::readAll();
?>



<aside>
    <table>
        <?php
        if($list !== null)
        {
            foreach($list as $item) {
                echo '<tr>';
                echo '<td><a href="ReadingOne.php?Id=' . $item['Id'] . '">-></a></td>';
                echo '<td>' . $item['Name'] . '</td>';
                echo '<td>' . $item['Starts'] . '</td>';
                echo '</tr>';
            }
        }
        else echo 'List is null';
        ?>
    </table>
</aside>
