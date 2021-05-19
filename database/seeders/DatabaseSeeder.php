<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Instituto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $instituto = new Instituto();
        $instituto->nombre = 'Institut Baix Camp';
        $instituto->direccion = 'Carrer Jacint Barrau';
        $instituto->save();

        $instituto1 = new Instituto();
        $instituto1->nombre = 'Institut Domenech i Montaner';
        $instituto1->direccion = 'Carretera Castellvell';
        $instituto1->save();

        $instituto2 = new Instituto();
        $instituto2->nombre = 'Institut Vilaseca';
        $instituto2->direccion = 'Carrer centre';
        $instituto2->save();

        $instituto3 = new Instituto();
        $instituto3->nombre = 'Col·legi Maria Rosa Molas';
        $instituto3->direccion = 'Carretera Rosa Molas';
        $instituto3->save();
        
    }
}
