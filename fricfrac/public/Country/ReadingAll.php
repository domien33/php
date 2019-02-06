<?php
    $countryList = ModernWays\FricFrac\Dal\Country::readAll();
?>

<aside>
    <table>
        <?php
        if($countryList !== null)
        {
            foreach($countryList as $countryItem) {
                echo '<tr>';
                echo '<td><a href="ReadingOne.php?Id=' . $countryItem['Id'] . '">-></a></td>';
                echo '<td>' . $countryItem['Name'] . '</td>';
                echo '<td>' . $countryItem['Code'] . '</td>';
                echo '</tr>';
            }
        }
        else echo 'List is null';
        ?>
    </table>
</aside>
