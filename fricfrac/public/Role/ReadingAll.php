<?php
    $roleList = \ModernWays\FricFrac\Dal\Role::readAll();
?>

<aside>
    <table>
        <?php
            foreach($roleList as $roleItem) {
                echo '<tr>';
                echo '<td><a href="ReadingOne.php?Id=' . $roleItem['Id'] . '">-></a></td>';
                echo '<td>' . $roleItem['Address1'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</aside>

<?php    
    
?>