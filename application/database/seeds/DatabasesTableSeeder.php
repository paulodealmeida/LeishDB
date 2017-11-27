<?php

use Illuminate\Database\Seeder;
use App\Models\Database;

class DatabasesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('databases')->delete();

        Database::create([
            'id' => 1,
            'description' => 'embl',
            'url' => 'http://www.embl.org',
            'url_by_integration' => 'http://www.ebi.ac.uk/ena/data/view/'
        ]);

        Database::create([
            'id' => 2,
            'description' => 'pdb',
            'url' => 'http://www.rcsb.org/pdb/home/home.do',
            'url_by_integration' => 'http://www.rcsb.org/pdb/explore/explore.do?structureId='
        ]);

        Database::create([
            'id' => 3,
            'description' => 'proteinmodelportal',
            'url' => 'http://www.proteinmodelportal.org/',
            'url_by_integration' => 'http://www.proteinmodelportal.org/query/up/'
        ]);

        Database::create([
            'id' => 4,
            'description' => 'biogrid',
            'url' => 'http://thebiogrid.org',
            'url_by_integration' => 'http://thebiogrid.org/'
        ]);

        Database::create([
            'id' => 5,
            'description' => 'string',
            'url' => 'http://string-db.org/',
            'url_by_integration' => 'http://string-db.org/newstring_cgi/show_network_section.pl?identifier='
        ]);

        Database::create([
            'id' => 6,
            'description' => 'drugbank',
            'url' => 'http://www.drugbank.ca',
            'url_by_integration' => 'http://www.drugbank.ca/drugs/'
        ]);

        Database::create([
            'id' => 7,
            'description' => 'pride',
            'url' => 'http://www.ebi.ac.uk/pride/',
            'url_by_integration' => 'http://www.ebi.ac.uk/pride/searchSummary.do?queryTypeSelected=identification%20accession%20number&identificationAccessionNumber='
        ]);

        Database::create([
            'id' => 8,
            'description' => 'kegg',
            'url' => 'http://www.genome.jp',
            'url_by_integration' => 'http://www.genome.jp/dbget-bin/www_bget?'
        ]);

        Database::create([
            'id' => 9,
            'description' => 'ensembl',
            'url' => 'http://www.ensembl.org/',
            'url_by_integration' => 'http://www.ensembl.org/id/'
        ]);

        Database::create([
            'id' => 10,
            'description' => 'eggnog',
            'url' => 'http://eggnogdb.embl.de',
            'url_by_integration' => 'http://eggnogdb.embl.de/#/app/results?seqid='
        ]);

        Database::create([
            'id' => 11,
            'description' => 'inparanoid',
            'url' => 'http://inparanoid.sbc.su.se',
            'url_by_integration' => 'http://inparanoid.sbc.su.se/cgi-bin/gene_search.cgi?id='
        ]);

        Database::create([
            'id' => 12,
            'description' => 'interpro',
            'url' => 'https://www.ebi.ac.uk/interpro/',
            'url_by_integration' => 'http://www.ebi.ac.uk/interpro/entry/'
        ]);

        Database::create([
            'id' => 13,
            'description' => 'ncbi',
            'url' => 'https://www.ncbi.nlm.nih.gov/gene',
            'url_by_integration' => 'https://www.ncbi.nlm.nih.gov/gene/'
        ]);

        Database::create([
            'id' => 14,
            'description' => 'tritrypdb',
            'url' => 'http://tritrypdb.org',
            'url_by_integration' => 'http://tritrypdb.org/tritrypdb/app/record/gene/'
        ]);
    }

}
