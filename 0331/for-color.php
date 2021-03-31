<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for-color</title>

    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>

    <table>

        <?php for ($i = 0; $i < 16; $i++) : ?>  
        <tr>
            <?php for ($j = 0; $j < 16; $j++) : ?>
            <td style="background-color:<?= sprintf('#00%X%X%X%X', $j, $j, $i, $i) ?>"></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

    <table>

        <?php for ($i = 0; $i < 16; $i++) : ?>  
        <tr>
            <?php for ($j = 0; $j < 16; $j++) : ?>
            <td style="background-color:<?= sprintf('#%X%X00%X%X', $j, $j, $i, $i) ?>"></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
    <table>

        <?php for ($i = 0; $i < 16; $i++) : ?>  
        <tr>
            <?php for ($j = 0; $j < 16; $j++) : ?>
            <td style="background-color:<?= sprintf('#%X%X%X%X00', $j, $j, $i, $i) ?>"></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

    

</body>

</html>