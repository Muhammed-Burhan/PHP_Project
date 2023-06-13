<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href=""
      rel="stylesheet"
    />
    <title>php_basic</title>
  </head>
  <body>
    <?php
    $name='Dark Matter';
    $read=true;
    $message;
    if(!$read){
         $message ="You have read ".$name;
    }else {
        $message="You haven't read ".$name;
    }
    ?>
    <h1>
       <?= $message ?>
    </h1>

    <br>

    <?php
    $books=[
      "Do Androids Dream of Electric Sheep",
      "The Langoliers",
      "Hail Mary"
    ];
   
    ?>



    <ul>
      <?php foreach($books as $book) : ?>
        <li> <?= $book ?> </li>
        <?php endforeach; ?>
    </ul>


        <br>

        <p>
          <?php echo $books[2] ?>
        </p>
  
  
<h4>test</h4>
<ul>
  <?php foreach($filteredBooks as $book_a) : ?>
    <li>
    <a href=<?= $book_a['name'] ?>>
    <?= $book_a['name'] ?>
    </a>    
    </li>
    <?php endforeach; ?>
</ul>
<br> 




  </body>
</html>
