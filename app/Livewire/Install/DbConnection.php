<?php

namespace App\Livewire\Install;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class DbConnection extends Component
{
    public $db_host;

    public $db_port;

    public $db_database;

    public $db_username;

    public $db_password;


    public function render()
    {
        
        $detail_file = storage_path('app'. DIRECTORY_SEPARATOR .'detail-file.json');

        if(!file_exists($detail_file)) {
            redirect()->route('install.basic-details');
        }
        
        $db_connection = storage_path('app'. DIRECTORY_SEPARATOR .'db-connection.json');

        if(file_exists($db_connection)) {
            
            $db = file_get_contents($db_connection);

            $db = json_decode($db, true);

            $this->db_host = $db['db_host'];

            $this->db_port = $db['db_port'];

            $this->db_database = $db['db_database'];

            $this->db_username = $db['db_username'];

            $this->db_password = $db['db_password'];

        } else {

            $this->db_host = '127.0.0.1';

            $this->db_port = '3306';

            $this->db_password = '';

        }

        return view('livewire.install.db-connection');
    }

    public function save()
    {

        $db = storage_path('app'. DIRECTORY_SEPARATOR .'db-connection.json');

        $data = [
            'db_host' => $this->db_host,
            'db_port' => $this->db_port,
            'db_database' => $this->db_database,
            'db_username' => $this->db_username,
            'db_password' => $this->db_password,
        ];

        file_put_contents($db, json_encode($data));

        sleep(5);

        redirect()->route('install.admin-user');
    }
}
