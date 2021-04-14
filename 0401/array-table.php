<?php include __DIR__.'../../parts/comfig.php' ?> 

<!-- 需要置換的變數們 -->
<?php 

    $page_title = '個人資料' ;
    $mycss = 'common.css';

    $persons = [
        [
            'name' => 'wanwan',
            'age' => '32',
            'gender' => 'female'
        ],
        [
            'name' => 'andrew',
            'age' => '31',
            'gender' => 'male'
        ],
        [
            'name' => 'tszin',
            'age' => '25',
            'gender' => 'female'
        ],
        [
            'name' => 'jack',
            'age' => '28',
            'gender' => 'male'
        ],
    ];

?>

<?php include __DIR__.'../../parts/html-head.php' ?>
<!-- 這裡插入要放在head的東西 -->


<?php include __DIR__.'../../parts/html-body.php' ?>

<?php include __DIR__.'../../parts/navber.php' ?>
<!-- 這裡插入要放在body的內容 -->

<div class="container">
<table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $persons as $p): ?>
            <tr>
                <td><?= $p['name'] ?></td>
                <td><?= $p['age'] ?></td>
                <td><?= $p['gender'] ?></td>    
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>


<?php include __DIR__.'../../parts/scripts.php' ?>
<!-- 這裡插入jQuery或JS -->
<script>

</script>

<?php include __DIR__.'../../parts/html-foot.php' ?>