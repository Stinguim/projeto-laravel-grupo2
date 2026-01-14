<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Lodging;
use App\Models\CleaningRequest;
use App\Models\Cleaning;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application"s database.
     */
    public function run()
    {
        // Faz 2 supervisores
        $supervisors = User::factory(2)->create([
            "password" => "teste12345",
            "user_type" => "supervisor"
        ]);

        // Faz 2 companhias
        $companies = Company::factory(2)->create([
            "user_id" => $supervisors->pluck("id_user")->random()
        ]);

        // Faz 2 clientes
        $clients = User::factory(2)->create([
            "user_type" => "client"
        ]);

        // Faz 2 funcionários
        User::factory(2)->create([
            "user_type" => "employee"
        ]);

        // Faz 2 alojamentos
        $lodgings = Lodging::factory(2)->create([
            "user_id" => $clients->pluck("id_user")->random()
        ]);

        // Faz 8 pedidos de alojamento
        CleaningRequest::factory(8)->create([
            "company_id" => $companies->pluck("id_company")->random(),
            "lodging_id" => $lodgings->pluck("id_lodging")->random(),
            "user_id" => $clients->pluck("id_user")->random(),
            "state" => 1
        ]);
    }

}
