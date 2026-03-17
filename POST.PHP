
<?php
//check if form was submitted
if(isset($_post[`verzenden`])){
    $naam=$_post[`naam`];
    $achternaam=$_post[`achternaam`];
    echo $naam."".$achternaam;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<form method="post">
    <input typ="text" name="name" placeholder="Naam"
</head>
<body>
    
    <!--formulier-->
    <form methof="post" action="post.php">
        <input type="text"name="naam">
        <input type="text"name="achternaam">
        <input type="submit"name="verzend" value="verzenden">
</body>
</html>