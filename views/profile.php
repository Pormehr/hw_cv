<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/vendors/slick-carousel/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">



</head>
<body>

<table>
    <tr>
        <td>
            <img class="prof" src="<?= $user_information['picture'] ?>" style="width:200px; height:200px; border-radius:50%">
        </td>
        <td style="vertical-align:top;">
            <h1><?= $user_information['name'] ?><i class="fa fa-flag" aria-hidden="true"></i>

            </h1>
            <div><?= $user_information['slogan'] ?></div>
            <hr>
        </td>
    </tr>
</table>
<br/>
<div class="projects">
    <?php foreach($projects_information as $item){?>
        <div class="block">
            <img src="<?= $item['picture'] ?? 'https://psmag.com/.image/c_limit%2Ccs_srgb%2Cq_auto:good%2Cw_600/MTI3NTgxNjQzMjg3NDE0Nzk0/brain-on-math.webp' ?>"/>
            <div>
                <?= $item['name'] ?>
            </div>
        </div>
    <?php } ?>
</div>

<script src="assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="assets/js/main.js">
<script src="assets/vendors/slick-carousel/slick/slick.min.js"></script>

</body>
</html>
