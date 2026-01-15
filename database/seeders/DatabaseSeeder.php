<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Lodging;
use App\Models\CleaningRequest;
use App\Models\Cleaning;
use App\Models\CleaningTeam;
use Illuminate\Support\Facades\DB;
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
            "password" => "teste12345",
            "user_type" => "client"
        ]);

        // Faz 2 funcionários
        User::factory(2)->create([
            "password" => "teste12345",
            "user_type" => "employee"
        ]);

        // Faz 2 alojamentos
        $lodgings = Lodging::factory(2)->create([
            "user_id" => $clients->pluck("id_user")->random()
        ]);

        // Faz 8 pedidos de alojamento
        CleaningRequest::factory(6)->create([
            "company_id" => $companies->pluck("id_company")->random(),
            "lodging_id" => $lodgings->pluck("id_lodging")->random(),
            "user_id" => $clients->pluck("id_user")->random()
        ]);

        // Testar a parte de limpezas, tem de se fazer esta parte do seeder

        // Escolher uma company que exista mesmo
        $company = Company::inRandomOrder()->first();

        // Supervisor dessa company
        $supervisor = User::where('id_user', $company->user_id)->first();

        // Escolher 1 employee
        $employee = User::where('user_type', 'employee')->first();

        // Criar cleaning team
        $cleaningTeam = CleaningTeam::factory()->create([
            'company_id' => $company->id_company
        ]);

        // Associar employee à cleaning team
        DB::table('cleaning_team_has_user')->insert([
            'cleaning_team_id' => $cleaningTeam->id_cleaning_team,
            'user_id' => $employee->id_user
        ]);

        $companyRequests = CleaningRequest::factory(2)->create([
            'company_id' => $company->id_company,
            'lodging_id' => $lodgings->first()->id_lodging,
            'user_id' => $clients->first()->id_user,
            'state' => 2
        ]);

        // Criar limpezas To do para a cleaning team do employee
        foreach ($companyRequests as $req) {
            Cleaning::create([
                'cleaning_request_id' => $req->id_cleaning_request,
                'cleaning_team_id'    => $cleaningTeam->id_cleaning_team,
                'estado'              => 'To do',
                'date'                => now()->addDays(rand(1, 5))
            ]);
        }
    }

}
