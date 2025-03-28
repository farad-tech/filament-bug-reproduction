<?php

namespace App\Livewire\Install;

use Livewire\Component;

class Sidebar extends Component
{

    public $links;

    public $current;

    public function render()
    {

        $this->current = url()->current();

        $this->links = [
            [
                'route' => 'install.basic-details',
                'title' => 'اطلاعات وبسایت',
            ],
            [
                'route' => 'install.db-connection',
                'title' => 'اتصال دیتابیس',
            ],
            [
                'route' => 'install.admin-user',
                'title' => 'کاربر ادمین',
            ],

        ];

        return view('livewire.install.sidebar');
    }
}
