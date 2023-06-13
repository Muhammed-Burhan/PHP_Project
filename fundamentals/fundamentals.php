<?php

         $books_a=[
    [
      'name'=>"Do Androids Dream of Electric Sheep",
      'author'=>'Philip K. Dick',
      'releaseYear'=>1968,
      'purchaseUrl'=>'https://example.com'
    ] , 
     [
      'name'=>"Hail Mary",
      'author'=>'Andy Weir',
      'releaseYear'=>2021,
      'purchaseUrl'=>'https://example.com'
     ]
    ];

    // $filter=function ($items,$fn){
    //   $filteredItems=[];
    //   foreach($items as $item){
    //     if($fn($item)){
    //       $filteredItems[]=$item;
    //     }
    //   }

    //   return $filteredItems;
    // };

    $filteredBooks=array_filter($books_a,function($book){
      return $book['author'] === 'Andy Weir';
    });
  require "fundamentals.view.php";
