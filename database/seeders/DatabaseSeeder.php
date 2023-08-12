<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mentalome;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mentalome::truncate();
        $csvData = fopen(database_path('test_data.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
//            dd($data);
            if (!$transRow) {
                Mentalome::create([
                    'id' => $data['0'],
                    'gene_ids' => $data['1'],
                    'value' => $data['2'],
                    'SRA' => $data['3'],
                    'Abbreviation' => $data['4'],
                    'experiment' => $data['5'],
                    'disease' => $data['6'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
