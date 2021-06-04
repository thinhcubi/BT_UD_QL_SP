<?php

namespace Model;

class Product
{
    public string $name;
    public int $price;
    public string $description;
    public string $producer;
    public string $id;

    public function __construct(string $name,int $price,string $description,string $producer)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->producer = $producer;
    }
  public function setId($id)
  {
      $this->id = $id;
  }



}
