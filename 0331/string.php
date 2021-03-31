<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string</title>
    <style>
        .title {
            color: lightcoral;
        }
    </style>
</head>

<body>
    <?php

        $pet_name = 'snowcake';
        echo "My Pet's name is

        <h1>${pet_name}</h1>

        ";

        // 字串雙引號包 > 可以使用跳脫任何字元和放變數
        $a = "PHP\nMySQL是\"好朋友!\"\\\\<br>"; //跳脫字元
        echo $a;
        // 字串單引號包 > 只能跳脫\和'，不能放變數
        $b = 'PHP\nMySQL是\'好朋友!\'\\\\<br>'; //跳脫字元
        echo $b;

        //舊寫法
        $c = <<<MYWORD
        <br>
        <h2 class="title">PUI~PUI~</h2>
MYWORD;
        echo $c;


    ?>
</body>

</html>