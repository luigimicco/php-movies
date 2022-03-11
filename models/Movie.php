<?php 


class Movie 
{
  private $id;
  private $title;
  private $category_id;

  public function __construct($title, $category_id) {
    $this->setTitle($title);
    $this->setCategory($category_id);
  } 

  public function setId($value) {
    $this->id  = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setTitle($value) {
    $this->title  = $value;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setCategory($value) {
    $this->category_id  = $value;
  }

  public function getCategory() {
    return $this->category_id;
  }


}