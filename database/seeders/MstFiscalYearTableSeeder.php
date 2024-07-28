<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstFiscalYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_fiscal_year')->truncate();
        $rows = [
            [
                'client_id' => '1',
                'code' => '2080/81',
                'date_from_bs' => '2080/04/01',
                'date_from_ad' => '2022-07-17',
                'date_to_bs' => '2081/03/32',
                'date_to_ad' => '2024-07-15',
                'status' => true,
            ],
        ];
        DB::table('mst_fiscal_year')->insert($rows);
    }
}
