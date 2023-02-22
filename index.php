<?php
include('model/database.php');
include('model/todoitems_db.php');

$title =filter_input(INPUT_POST, "title",FILTER_UNSAFE_RAW);
$description =filter_input(INPUT_POST, "description",FILTER_UNSAFE_RAW);


if($_GET['action'] == 'deleteItem'){  //runs the delete function after clicking delete button coded below

    delete_item($_GET['id']); // ItemNum to delete passed in id of href in foreach below
}

if($title){
    add_item($title, $description);
}

$items=get_items();
//var_dump($items);
foreach($items as $item){
    echo "<p>$item[Title] &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $item[Description]"; 

    // passes list item of ItemNum value to delete_item function 
    echo "<a href=\"index.php?action=deleteItem&id=$item[ItemNum]\"><button style='margin-left: 5px; padding: .5em;'>DELETE</button></a></p>";

}

?>
<br>
<br>

<section>
            <h2>Add an Item</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
                <label for= "description">Description:</label>
                <input type="text" id="description" name="description" required>
                <button>Submit</button>
            </form>
</section>
<?php

?>


