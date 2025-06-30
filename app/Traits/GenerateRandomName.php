<?php

namespace App\Traits;

trait GenerateRandomName
{
  public function generateRandomName($file)
  {
    $randomString = uniqid();
    $extension = $file->getClientOriginalExtension();
    $name = $randomString . '.' . $extension;
    return $name;
  }
}
