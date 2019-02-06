<?php
include ('../../../../autoload.php');


// EventCategory


if (\ModernWays\FricFrac\Dal\EventCategory::delete(5)) {
    echo 'Delete is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}

if (\ModernWays\FricFrac\Dal\EventCategory::create(array('Name' => 'Summerfest'))) {
    echo 'Create is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\EventCategory::getMessage();

if (\ModernWays\FricFrac\Dal\EventCategory::readOne($Name = 'Summerfest')) {
    echo 'Alles wat u zocht!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\EventCategory::getMessage();

if (\ModernWays\FricFrac\Dal\EventCategory::readAll()) {
    echo"</br>Alles!</br>";
}else {
    echo"readAll Mislukt!";
}

if (\ModernWays\FricFrac\Dal\EventCategory::update(array('Id'=> '4', 'Name' => 'Tomorrowland'))) {
    echo'Update gelukt';
}else {
    echo'Update failed';
}


// EventTopic


if (\ModernWays\FricFrac\Dal\EventTopic::delete(5)) {
    echo 'Delete is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}

if (\ModernWays\FricFrac\Dal\EventTopic::create(array('Name' => 'Outdoor Festival'))) {
    echo 'Create is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\EventTopic::getMessage();

if (\ModernWays\FricFrac\Dal\EventTopic::readOne($Name = 'Outdoor Festival')) {
    echo 'Alles wat u zocht!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\EventTopic::getMessage();

if (\ModernWays\FricFrac\Dal\EventTopic::readAll()) {
    echo"</br>Alles!</br>";
}else {
    echo"readAll Mislukt!";
}

if (\ModernWays\FricFrac\Dal\EventTopic::update(array('Id'=> '4', 'Name' => 'Indoor Festival'))) {
    echo'Update gelukt';
}else {
    echo'Update failed';
}


// Role


if (\ModernWays\FricFrac\Dal\Role::delete(5)) {
    echo 'Delete is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}

if (\ModernWays\FricFrac\Dal\Role::create(array('Name' => 'Bezoeker'))) {
    echo 'Create is gelukt!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\Role::getMessage();

if (\ModernWays\FricFrac\Dal\Role::readOne($Name = 'Bezoeker')) {
    echo 'Alles wat u zocht!';
} else {
    echo 'Oeps er is iets fout gelopen!';
}
echo \ModernWays\FricFrac\Dal\Role::getMessage();

if (\ModernWays\FricFrac\Dal\Role::readAll()) {
    echo"</br>Alles!</br>";
}else {
    echo"readAll Mislukt!";
}

if (\ModernWays\FricFrac\Dal\Role::update(array('Id'=> '4', 'Name' => 'Host'))) {
    echo'Update gelukt';
}else {
    echo'Update failed';
}