<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form表單</title>
</head>

<body>

    <!-- form表單預設method="get" -->
    <form action="">

        <input type="number" name="score" min="0" max="100" value="<?= $_GET['score'] ?? '' ?>" >
        <input type="submit" value="送出">
        <br>
        <br>

        <?php

            if( isset($_GET['score']) && $_GET['score'] >=60 ){
                $socre = $_GET['score'];
                $rank = intval($socre / 10);

                switch($rank){
                    case 10:
                    case 9:
                        $myrank = 'A';
                        break;
                    case 8:
                        $myrank = 'B';
                        break;
                    case 7:
                        $myrank = 'C';
                        break;
                    case 6:
                        $myrank = 'D';
                        break;
                }

                echo "你的分數是{$socre}分，等級:{$myrank}";

            } elseif( isset($_GET['score']) && $_GET['score'] < 60 ){
                $socre = $_GET['score'];
                echo "你的分數是{$socre}分，等級:F";
            } 

        ?>




    </form>

</body>

</html>