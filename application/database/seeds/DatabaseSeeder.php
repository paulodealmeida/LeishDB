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
        $this->call(ProteinsTableSeeder::class);
        $this->call(DatabasesTableSeeder::class);
        $this->call(GeneontologyTableSeeder::class);
        $this->call(ChromosomesTableSeeder::class);
        //$this->call(GenesTableSeeder::class);
        $this->call(NcrnaTableSeeder::class);
        $this->call(CrossreferenceTableSeeder::class);
        $this->call(ProteinsgoTableSeeder::class);
        //$this->call(PublicationsTableSeeder::class);

        Model::reguard();
    }

}
