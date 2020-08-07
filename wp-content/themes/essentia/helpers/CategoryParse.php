<?php
class CategoryParse {
  private $categories;
  public function __construct($categories){
    $this->categories = $categories;
  }
  function createClassFromCategories(){
    $categories_array = [];
    foreach($this->categories as $category){
      array_push($categories_array, $category->slug);
    }
    $class_names = implode(' ', $categories_array);
    return $class_names;
  }
}