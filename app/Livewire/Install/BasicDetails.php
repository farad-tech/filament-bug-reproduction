<?php

namespace App\Livewire\Install;

use Livewire\Component;

class BasicDetails extends Component
{

    public $app_name;

    public $app_url;

    public function render()
    {

        $detail_file = storage_path('app'. DIRECTORY_SEPARATOR .'detail-file.json');

        if(file_exists($detail_file)) {
            
            $detail = file_get_contents($detail_file);

            $detail = json_decode($detail, true);

            $this->app_name = $detail['app_name'];
            $this->app_url = $detail['app_url'];

        } else {
            $this->app_url = "https://" . $_SERVER['SERVER_NAME'];

        }


        return view('livewire.install.basic-details');
    }

    public function save()
    {

        $detail_file = storage_path('app'. DIRECTORY_SEPARATOR .'detail-file.json');

        $data = [
            'app_name' => $this->app_name,
            'app_url' => $this->app_url,
        ];

        
        file_put_contents($detail_file, json_encode($data));

        redirect()->route('install.db-connection');
    }
}
