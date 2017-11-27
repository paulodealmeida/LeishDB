<?php

use Illuminate\Database\Seeder;
use App\Models\Organism;

class OrganismsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisms')->delete();

        Organism::create([
            'id' => 1,
            'name' => 'Leishmania braziliensis'
        ]);
    }

}
