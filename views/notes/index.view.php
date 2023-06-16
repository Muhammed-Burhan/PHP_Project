<?php 

require  __DIR__.'/../'."partials/head.php";
require __DIR__.'/../'."/partials/nav.php"; 
require  __DIR__.'/../'."partials/banner.php"
?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul> 
        <?php foreach($notes as $note) :?>
        <li>
            <a class="text-blue-500 hover:underline" href="/note?id=<?=$note['id']?>">
            <?=htmlspecialchars($note['body'])?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>  
         <p class='mt-6'>
          <a href="/notes/create"  class=" text-blue-500 hover:underline">Create Note</a>
        </p>
        </div>
       
  </main>

  <?php require __DIR__."/../"."partials/footer.php" ?>

  <!-- [
    'id'=>1,'body'=>dsds,'user_id'
    ],
      [
    'id'=>1,'body'=>dsds,'user_id'
    ] -->