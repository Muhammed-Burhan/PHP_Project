<?php 
require "partials/head.php";
require "partials/nav.php"; 
require "partials/banner.php"
?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <p class='mb-8'>
          <?=$note['body']?>
        </p>
      <a href="/notes" class='  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>
        Go back ....
      </a>      
    </div>
  </main>

  <?php require "partials/footer.php" ?>


  <!-- [
    'id'=>1,'body'=>dsds,'user_id'
    ],
      [
    'id'=>1,'body'=>dsds,'user_id'
    ] -->