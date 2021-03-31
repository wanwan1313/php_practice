<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for迴圈</title>

    <style>


        td {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
        }

        body {
            font-size: 20px;
        }
    </style>
</head>
<body>
    
    <table border="1">

        <?php for($i=0; $i<10; $i++): ?>

        <tr>

            <?php for($j=0; $j<10; $j++): ?>
            
                <td><?= ($i+1)*($j+1) ?></td>
            
            <?php endfor; ?>

        </tr>

        <?php endfor; ?>
    </table>


    <pre>

        <?php

            for($a=1; $a<10; $a++){
                printf('<br>');
                for($b=1; $b<10; $b++){
                    $c= $a*$b;
                    printf( '%s*%s=%s  ' , $a,$b,$c );
                }
                printf('<br>');
            }


        ?>
        
    </pre>
    
</body>
</html>