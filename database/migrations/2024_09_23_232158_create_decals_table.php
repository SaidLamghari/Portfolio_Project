<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method defines the structure of the 'decals' table.
     * It is called when the migration is executed.
     *
     * @return void
     */
    public function up()
    {
        // Create 'decals' table
        Schema::create('decals', function (Blueprint $table) {
            // Define an auto-incrementing primary key (id)
            $table->id();
            
            // Define a string column 'Reference_Decal' for storing a unique identifier for the decal
            // This column must be unique across the table
            $table->string('Reference_Decal')->unique();
            
            // Define a foreign key column 'Bloc_Id' referencing the 'id' column on the 'blocs' table
            $table->foreignId('Bloc_Id');
            
            // Define a foreign key column 'Prelevement_Id' referencing the 'id' column on the 'prelevements' table
            $table->foreignId('Prelevement_Id');
            
            // Define a boolean column 'Import' with a default value of 0 (possibly to track import status)
            $table->boolean('Import')->default(0);
            
            // Add timestamps (created_at and updated_at columns)
            $table->timestamps();

            // Define the foreign key constraint for 'Bloc_Id', linking it to the 'id' in the 'blocs' table
            // On delete or update of the bloc, it will cascade the changes to this table
            $table->foreign('Bloc_Id')
                ->references('id')
                ->on('blocs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            // Define the foreign key constraint for 'Prelevement_Id', linking it to the 'id' in the 'prelevements' table
            // On delete or update of the prélèvement, it will cascade the changes to this table
            $table->foreign('Prelevement_Id')
                ->references('id')
                ->on('prelevements')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is called when the migration is rolled back,
     * dropping the 'decals' table.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'decals' table if it exists
        Schema::dropIfExists('decals');
    }
};
