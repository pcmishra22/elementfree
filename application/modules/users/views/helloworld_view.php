<html>
    <head>
        <title><?=$page_title?></title>
    </head>
    <body>

<h1>Welcome to my page </h1>
<?php foreach($result as $row):?>
        <h3><?=$row->title?></h3>
        <p><?=$row->text?></p>
        <br />
        <?php endforeach;?>

  </body>
</html>

