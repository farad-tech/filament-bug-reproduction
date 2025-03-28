<?php

namespace App\Thumbnail;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Nette\Utils\Random;

class ThumbnailImage implements ThumbnailInterface
{

  public $image;

  public function generate($imagePath){
    
    $manager = new ImageManager(
      new Driver()
    );
  
    $image = $manager->read($imagePath);
  
    // resize image instance
    $image->resize(height: 60, width: 60);
  
    $image->blur(15);

    // encode edited image
    $this->image = $image->encode();

    
  }

  public function save($thumbnailName)
  {
    $img = $this->image;

    Storage::disk('public')->put($thumbnailName, $img);

    $thumbnailFile = storage_path("app/public/$thumbnailName");
    
    Storage::disk('chat_files_ftp')->put($thumbnailName, file_get_contents($thumbnailFile));

    unlink($thumbnailFile);

    return Config::get('filesystems.ftp_domain') . Config::get('filesystems.disks.chat_files_ftp.root') . '/' . $thumbnailName;
  }

}