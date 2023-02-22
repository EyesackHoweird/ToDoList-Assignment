<?php

function get_items(){
    global $db;
    $query = 'SELECT * FROM `todoitems` ORDER BY ItemNum';
    $statement = $db-> prepare($query);
    $statement->execute();
    $todoitems = $statement->fetchALL();
    $statement->closeCursor();
    return $todoitems;
}
function get_item_title($itemNum){
    if(!$itemNum) {
        return "All Course";
    }
    global $db;
    $query = 'SELECT * FROM `todoitems` WHERE ItemNum = :itemNum';
    $statement = $db-> prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $statement->execute();
    $todoitems = $statement->fetch();
    $statement->closeCursor();
    $title = $todoitems['title'];
    return $title;
}
function delete_item($itemNum){
    global $db;
    $query = 'DELETE FROM todoitems
    WHERE ItemNum = :itemNum';
    $statement = $db-> prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $statement->execute();
    $statement->closeCursor();
}
function add_item($title, $description){
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description) VALUES (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":description", $description);
    $statement->execute();
    $statement->closeCursor();
}
?>