<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users seeder

        //First we seed the Admins at the Users table
        for ($i = 1; $i <= 5; $i++) {
            $user_fn = "admin_fn" . $i;
            $user_ln = "admin_ln" . $i;
            $email = "admin" . $i ."@gmail.com";
            $username = "admin" . $i;
            $password = "movies";
            $type = "Admin";

            DB::table('users')->insert([
                'firstname' => $user_fn,
                'lastname' => $user_ln,
                'email' => $email,
                'username' => $username,
                'password' => bcrypt($password),
                'type' => $type,
                'created_at' => Carbon\Carbon::now()
            ]);
        }

        // Then we seed the Admins at the Admins table
        $users = User::all();
        foreach ($users as $user) {
            // Everyone is admin at this point
            DB::table('admins')->insert([
                'admin_id' => $user->id,
                'added_by' => 1
            ]);
        }

        // Then we seed the customer types
        // For instance, there's gonna be just 1 type
        DB::table('customer_types')->insert([
            'name' => "normal"
        ]);

        // Then we seed the Customers at the Users table
        for ($i = 1; $i <= 10; $i++) {
            $user_fn = "customer_fn" . $i;
            $user_ln = "customer_ln" . $i;
            $email = "customer" . $i ."@gmail.com";
            $username = "customer" . $i;
            $password = "movies";
            $type = "Customer";

            DB::table('users')->insert([
                'firstname' => $user_fn,
                'lastname' => $user_ln,
                'email' => $email,
                'username' => $username,
                'password' => bcrypt($password),
                'type' => $type,
                'created_at' => Carbon\Carbon::now()
            ]);
        }

        // Then we seed the Customers at the Customers table
        $users = User::all();
        foreach ($users as $user) {
            // At this point, there are Admins and Customers
            if ($user->type == "Customer") {
                DB::table('customers')->insert([
                    'customer_id' => $user->id,
                    'type' => 1,
                    'is_banned' => 0,
                ]);
            }
        }

    }
}
