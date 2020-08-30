<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet"/>
</head>
<body>

<?php
if(isset($_SESSION['isOk'])){
    if($_SESSION['isOk']){
        ?>
        <div>Is Ok</div>
     <?php
    }else{
        ?>
        <div>Is Not Ok</div>
        <?php
    }
}
?>

<form action="/admin/submit" enctype="multipart/form-data" method="POST">
    Full name: <input type="text" name="name" value="<?= $profile['name'] ?? '' ?>" /><br/><br/>
    Slogan: <input type="text" name="slogan" value="<?= $profile['slogan'] ?? '' ?>" /><br/><br/>
    Picture: <input type="file" name="picture" value="<?= $profile['picture'] ?? '' ?>" /><br/><br/>
    <input type="submit" value="Submit"/>

</form>


<script src="assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>
