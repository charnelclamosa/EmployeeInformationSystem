<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::truncate();
        $contracts = [
            ['contract_code' => 'C', 'contract_name' => 'Contractual', 'updated_by' => 'admin'],
            ['contract_code' => 'PRB', 'contract_name' => 'Probitionary', 'updated_by' => 'admin'],
            ['contract_code' => 'REG', 'contract_name' => 'Regular', 'updated_by' => 'admin'],
            ['contract_code' => 'RES', 'contract_name' => 'Resigned', 'updated_by' => 'admin'],
            ['contract_code' => 'TER', 'contract_name' => 'Terminated', 'updated_by' => 'admin']
        ];
        foreach ($contracts as $key => $contract) {
            Contract::create($contract);
        }
    }
}
