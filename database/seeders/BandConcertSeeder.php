<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\Band;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('bands_concerts')
                ->insert([
                    'band_id' => Band::all()->random()->id,
                    'concert_id' => Concert::all()->random()->id,
                ]);
        }
    }
}
