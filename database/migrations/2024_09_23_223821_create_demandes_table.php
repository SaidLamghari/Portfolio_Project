<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method defines the structure of the 'demandes' table.
     * It is called when the migration is executed.
     *
     * @return void
     */
    public function up()
    {
        // Create 'demandes' table
        Schema::create('demandes', function (Blueprint $table) {
            // Define an auto-incrementing primary key (id)
            $table->id();
            
            // Define a foreign key column 'Id_Bloc' referencing the 'id' column on the 'blocs' table
            $table->foreignId('Id_Bloc');
            
            // Define a foreign key column 'Id_User' referencing the 'id' column on the 'users' table
            $table->foreignId('Id_User');
            
            // Define a string column 'Type_D' for storing the type of demand
            $table->string('Type_D');
            
            // Define a string column 'Status' with a default value of 'En attente' (pending)
            $table->string('Status')->default('En attente');
            
            // Define a nullable string column 'Commentaire_D' for optional comments about the demand
            $table->string('Commentaire_D')->nullable();
            
            // Define an integer column 'Degree_Reinclusion' to store the degree of reinclusion, nullable
            $table->integer('Degree_Reinclusion')->nullable();
            
            // Define an integer column 'Nombre_Recoupe' for the number of recoups, nullable
            $table->integer('Nombre_Recoupe')->nullable();
            
            // Define a date column 'Date_Demande' for storing the date of the demand
            $table->date('Date_Demande');
            
            // Define a nullable string column 'Type_Coloration' for the type of coloration
            $table->string('Type_Coloration')->nullable();
            
            // Define a nullable string column 'Panel_Marquage' for the panel marking details
            $table->string('Panel_Marquage')->nullable();
            
            // Add timestamps (created_at and updated_at columns)
            $table->timestamps();

            // Define the foreign key constraint for 'Id_Bloc', linking it to the 'id' in the 'blocs' table
            // On delete or update of the bloc, it will cascade the changes to this table
            $table->foreign('Id_Bloc')
                ->references('id')
                ->on('blocs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            // Define the foreign key constraint for 'Id_User', linking it to the 'id' in the 'users' table
            // On delete or update of the user, it will cascade the changes to this table
            $table->foreign('Id_User')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is called when the migration is rolled back,
     * dropping the 'demandes' table.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'demandes' table if it exists
        Schema::dropIfExists('demandes');
    }
};
