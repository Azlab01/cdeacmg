<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommandeTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {
        DB::table('commandes')->delete();

        for($i = 0; $i < 100; ++$i)
        {
            $date = $this->randDate();
            DB::table('commandes')->insert([
                'predicateur' => 'predicateur' . $i,
                'theme' => 'theme' . $i,
                'nbre' => $i,
                'user_id' => rand(1, 10),
                'recorder_id' => rand(1, 10),
                'date_livraison' => $date,
                'date_culte' => $date,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}