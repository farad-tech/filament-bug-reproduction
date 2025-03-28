<?php

namespace App\Thumbnail;

interface ThumbnailInterface
{

  public function generate($filepath);

  public function save($thumbnailName);

}