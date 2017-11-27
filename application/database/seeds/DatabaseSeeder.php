<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(OrganismsTableSeeder::class);
        
        $this->call(DatabasesTableSeeder::class);
        $this->call(GeneontologyTableSeeder::class);
        $this->call(ChromosomesTableSeeder::class);

        $this->call(CrossreferenceTableSeeder::class);

        Model::reguard();
    }

}
