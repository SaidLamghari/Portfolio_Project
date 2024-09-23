<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Prelevement;
use App\Models\Bloc;
use App\Models\User;
use App\Models\Demande;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * This method populates the database with initial data for testing or development.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample services into the 'services' table
        Service::insert([
            ['Nom' => 'ACCORD'],
            ['Nom' => 'CM6'],
            ['Nom' => 'CMF'],
            ['Nom' => 'EXTERNE'],
            ['Nom' => 'INFECTIOLOGIE'],
            ['Nom' => 'NEUROCHIRURGIE'],
            ['Nom' => 'ORL'],
            ['Nom' => 'PEDIATRIE'],
            ['Nom' => 'PNEUMOLOGIE'],
            ['Nom' => 'TRAUMATOLOGIE'],
            ['Nom' => 'UROLOGIE']
        ]);

        // Create sample users with different roles
        User::create([
            'name' => 'SOUKAINA',
            'role' => 'Admin',
            'email' => 'Adminemail@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        User::create([
            'name' => 'KARIM',
            'role' => 'Technicien',
            'email' => 'Technicienemail@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        User::create([
            'name' => 'SAID',
            'role' => 'Medecin',
            'email' => 'Medecinemail@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        // Generate additional users using a factory
        \App\Models\User::factory(6)->create();

        // Create sample prelevements (samples) with different details
        Prelevement::create([
            'NumeroAnapath' => 10,
            'Service_Id' => 6,
            'User_Id' => 3,
            'Organe' => 'cerveau',
            'Type' => 'PO',
            'DateManipulation' => '2024-07-07',
            'Description' => 'The human brain is proportionally the largest brain of all mammals (based on the size of the rest of the body). Its primary function is to regulate all vital functions. To achieve this, the brain receives information from the entire human body through afferent nerves, analyzes it, and then sends new information back to various parts of the body via efferent nerves. Therefore, the brain has significant responsibilities. It is responsible for heart rate, respiration, body movement, memory, and more.',
            'NombreBlocs' => 3,
        ]);

        Prelevement::create([
            'NumeroAnapath' => 20,
            'Service_Id' => 10,
            'User_Id' => 3,
            'Organe' => 'coeur',
            'Type' => 'Reprelevement',
            'DateManipulation' => '2024-07-07',
            'Description' => 'Through regular contractions, the heart s main function is to distribute blood throughout the body to supply it with oxygen. Measuring about 1.5 times the size of a person s fist, this muscular organ pumps approximately 8,000 liters of blood daily. The heart is located in the thoracic cavity behind the sternum, a flat bone that is part of the thoracic skeleton (see infographic below). It is slightly shifted to the left in most individuals.',
            'NombreBlocs' => 5,
        ]);

        Prelevement::create([
            'NumeroAnapath' => 30,
            'Service_Id' => 4,
            'User_Id' => 3,
            'Organe' => 'rein',
            'Type' => 'Extemporanee',
            'DateManipulation' => '2024-07-07',
            'Description' => 'The kidneys are two small organs located on either side of the spine, beneath the rib cage (see infographic below), that filter about 120 liters of blood per day. The kidneys also produce 1 to 2 liters of urine daily, containing waste and excess fluid. They perform three vital functions for the body. They regulate the amount of water in the bodily system, eliminate waste and toxins, and produce hormones necessary for regulating blood pressure, producing red blood cells, and controlling calcium levels in the body.',
            'NombreBlocs' => 3,
        ]);

        Prelevement::create([
            'NumeroAnapath' => 40,
            'Service_Id' => 3,
            'User_Id' => 2,
            'Organe' => 'thyroïde',
            'Type' => 'Biopsie',
            'DateManipulation' => '2024-07-07',
            'Description' => 'The thyroid is located in the neck (see infographic below) and normally weighs between 15 and 20 grams. It is the largest endocrine gland in the body and is characterized by its butterfly-like shape. Its main function is to produce hormones that allow the body to function normally. By releasing hormones, the thyroid controls the body s metabolism and the functioning of several organs, while also influencing heart rate, muscles, weight, and energy levels, among other things.',
            'NombreBlocs' => 1,
            'NombreBiopsie' => 3,
        ]);

        // Create sample blocs (blocks) related to the prelevements
        Bloc::create([
            'Reference_Bloc' => '10A',
            'Prelevement_Id' => 1,
            'Commentaire' => 'comment',
            'Siege' => 'siege-1-1',
            'Cassettes' => 13,
            'Fragments' => 17,
            'Reste' => 'Non',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '10B',
            'Prelevement_Id' => 1,
            'Commentaire' => 'comment',
            'Siege' => 'siege-1-2',
            'Cassettes' => 17,
            'Fragments' => 13,
            'Reste' => 'Non',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '10C',
            'Prelevement_Id' => 1,
            'Commentaire' => 'comment',
            'Siege' => 'siege-1-3',
            'Cassettes' => 19,
            'Fragments' => 20,
            'Reste' => 'Non',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '20R1',
            'Prelevement_Id' => 2,
            'Commentaire' => 'comment',
            'Siege' => 'siege-1-1',
            'Cassettes' => 4,
            'Fragments' => 5,
            'Reste' => 'Oui',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '20R2',
            'Prelevement_Id' => 2,
            'Commentaire' => 'comment',
            'Siege' => 'siege-2-2',
            'Cassettes' => 9,
            'Fragments' => 3,
            'Reste' => 'Oui',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '20R3',
            'Prelevement_Id' => 2,
            'Commentaire' => 'comment',
            'Siege' => 'siege-2-3',
            'Cassettes' => 3,
            'Fragments' => 5,
            'Reste' => 'Non',
            'Decals' => 'OUI',
        ]);

        Bloc::create([
            'Reference_Bloc' => '20R4',
            'Prelevement_Id' => 2,
            'Commentaire' => 'comment',
            'Siege' => 'siege-2-4',
            'Cassettes' => 7,
            'Fragments' => 7,
            'Reste' => 'Non',
            'Decals' => 'OUI',
        ]);

        Bloc::create([
            'Reference_Bloc' => '20R5',
            'Prelevement_Id' => 2,
            'Commentaire' => 'comment',
            'Siege' => 'siege-2-5',
            'Cassettes' => 6,
            'Fragments' => 2,
            'Reste' => 'Non',
            'Decals' => 'OUI',
        ]);

        Bloc::create([
            'Reference_Bloc' => '30EXTP1',
            'Prelevement_Id' => 3,
            'Commentaire' => 'comment',
            'Siege' => 'siege-3-1',
            'Cassettes' => 1,
            'Fragments' => 3,
            'Reste' => 'Non',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '30EXTP2',
            'Prelevement_Id' => 3,
            'Commentaire' => 'comment',
            'Siege' => 'siege-3-2',
            'Cassettes' => 8,
            'Fragments' => 4,
            'Reste' => 'G',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '30EXTP3',
            'Prelevement_Id' => 3,
            'Commentaire' => 'comment',
            'Siege' => 'siege-3-3',
            'Cassettes' => 5,
            'Fragments' => 7,
            'Reste' => 'G',
            'Decals' => 'Non',
        ]);

        Bloc::create([
            'Reference_Bloc' => '40I',
            'Prelevement_Id' => 4,
            'Commentaire' => 'comment',
            'Siege' => 'siege-4-1',
            'Cassettes' => 1,
            'Fragments' => 0,
            'Reste' => 'Non',
            'Decals' => 'Non',
        ]);

        // Create sample demandes (requests) related to blocs
        Demande::create([
            'Id_Bloc' => '4',
            'Id_User' => '3',
            'Type_D' => 'Recoupe',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetu adipiscing elsed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Degree_Reinclusion' => 90,
            'Nombre_Recoupe' => 2,
            'Date_Demande' => '2024-07-07',
        ]);

        Demande::create([
            'Id_Bloc' => '9',
            'Id_User' => '3',
            'Type_D' => 'Coloration',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetu adipiscing elsed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Type_Coloration' => 'deep',
            'Date_Demande' => '2024-07-07',
        ]);

        Demande::create([
            'Id_Bloc' => '1',
            'Id_User' => '3',
            'Type_D' => 'IHC',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetu adipiscing elsed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Panel_Marquage' => 'chi panel',
            'Date_Demande' => '2024-07-07',
        ]);
    }
}
