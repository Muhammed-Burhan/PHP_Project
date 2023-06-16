<?php 
require  base_path("views/partials/head.php");
require base_path("views/partials/nav.php"); 
require  base_path("views/partials/banner.php");
?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
       <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/note">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
       
        <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
          <div class="mt-2">
            <textarea id="body" name="body"  rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6  "placeholder="Here is an idea for note...."><?= $note['body'] ?? '' ?></textarea>
          <input hidden type="text" name="_method" value="PATCH">
          <input hidden type="text" name="id" value=<?=$note['id']?>>

          </div>
          <?php if(isset($errors['body'])): ?>
            <p class='text-red-500 text-sm mt-4'><?=$errors['body']?></p>
          <?php endif;?>
          <?php if(!isset($errors['body'])): ?>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few Note.</p>
          <?php endif;?>
          

         
        </div>

      
     
    </div>
    <div class="flex items-center justify-around gap-x-2">



 <div class="flex items-center justify-end gap-x-2">
   <div class="mt-6 gap-x-6">
    <a href="/notes" type="submit" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">cancel</a>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    
  </div>
     </div>       
 
 
  </div>
</form>



    </div>
  </main>


  <?php require __DIR__."/../"."partials/footer.php" ?>


  <!-- [
    'id'=>1,'body'=>dsds,'user_id'
    ],
      [
    'id'=>1,'body'=>dsds,'user_id'
    ] -->