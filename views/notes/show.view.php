<?php 
require  __DIR__.'/../'."partials/head.php";
require __DIR__.'/../'."/partials/nav.php"; 
require  __DIR__.'/../'."partials/banner.php"
?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <p class='mb-8'>
          <?=htmlspecialchars($note['body'])?>
        </p>


      
          <div class="mt-6  gap-x-6 	">
           <form class=" flex items-center justify-start gap-x-6 " method="POST">
          <input hidden type="text" name="id" value=<?=$note['id']?>>
          <input hidden type="text" name="_method" value="DELETE">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                 Delete
        </button>
        </form>
        
      
         </div>

         <div class='mt-3'>
        <a href="note/edit?id=<?=$note['id']?>" class="text-gray-500 border border-current py-1 px-4 rounded hover:bg-black hover:text-white">Edit</a>
      </div>

        <br>
      <a href="/notes" class='  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>
        Go back ....
      </a>      
    </div>
  </main>

  <?php require __DIR__.'/../'."partials/footer.php" ?>


  <!-- [
    'id'=>1,'body'=>dsds,'user_id'
    ],
      [
    'id'=>1,'body'=>dsds,'user_id'
    ] -->