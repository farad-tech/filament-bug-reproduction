<?php

namespace App;

class MimeType
{

  public $file;

  public function __construct($file) {
    $this->file = $file;
  }

  public function checkImageMimeType()
  {

    $fileMimeType = $this->file->getMimeType();

    return str_contains($fileMimeType, 'image');
    
  }

  public function checkVideoMimeType()
  {


    $fileMimeType = $this->file->getMimeType();

    return str_contains($fileMimeType, 'video');
  }

}