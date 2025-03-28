<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Like;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $models = [

            'Admin',
            'License',
            'Post',
            'Report',
            'Setting',
            'ShabaNumber',
            'SMS',
            'Sticker',
            'User',
            'WalletFlow',

        ];

        // Role Seeder

        $super_admin = "Super Admin";

        $roles = [
            $super_admin => null,
            'Agent' => [],
        ];

        foreach ($roles as $role_name => $permissions)
        {

            // ----------------- Create role
            $role = Role::createOrFirst([
                'name' => $role_name
            ]);
            // -----------------

            // ----------------- Assign super admin role
            if($role_name == $super_admin)
            {

                $email = 'test@example.com';
                $user = User::where('email', $email)->first();
                
                if($user !== null) {

                    $user->assignRole($role->name);

                }

            }
            // -------------------

            // ------------------- P
            if($permissions !== null) {

                

            }

        }

    }
}
