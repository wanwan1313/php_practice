<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>include</title>

    <style>

        table {
            border: 1px solid lightcoral;
        }
    </style>
</head>
<body>
    
    <?php

    $item_name = 'name';
    $item_value = 'wanwan';


    include __DIR__."/parts/table.php";


    ?>


</body>
</html>