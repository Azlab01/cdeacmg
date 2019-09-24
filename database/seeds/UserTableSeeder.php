<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }
    public function run()
    {
        DB::table('users')->delete();

        for($i = 0; $i < 10; ++$i)
        {
             $date = $this->randDate();
            DB::table('users')->insert([
                'name' => 'Nom' . $i,
                'username' => 'username' . $i,
                'numero' => '00000'.$i,
                'email' => 'email' . $i . '@blop.fr',
                'password' => bcrypt('000000'),
                //'admin' => rand(0, 1)
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}