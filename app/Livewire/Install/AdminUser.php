<?php

namespace App\Livewire\Install;

use App\Models\Admin;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class AdminUser extends Component
{

    public $name;

    public $email;

    public $password;


    public function render()
    {
        
        Artisan::call('migrate:refresh');

        Artisan::call('db:seed', ['class' => 'SettingSeeder']);

        $admin_user = Admin::first();

        if($admin_user !== null) {

            $this->name = $admin_user->name;

            $this->email = $admin_user->email;

            $this->password = '';

        }

        return view('livewire.install.admin-user');
    }

    public function save()
    {

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];

        Admin::create($data);

        file_put_contents(storage_path('app'. DIRECTORY_SEPARATOR .'installed.json'), json_encode(['installed' => true]));

        redirect('/');
    }
}
