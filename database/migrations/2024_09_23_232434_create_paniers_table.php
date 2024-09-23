<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method defines the structure of the 'paniers' table.
     * It is called when the migration is executed.
     *
     * @return void
     */
    public function up()
    {
        // Create 'paniers' table
        Schema::create('paniers', function (Blueprint $table) {
            // Define an auto-incrementing primary key (id)
            $table->id();
            
            // Define a string column 'Ref_Bloc' for storing a reference block identifier
            // This column is nullable and unique across the table
            $table->string('Ref_Bloc')->nullable()->unique();
            
            // Define a nullable foreign key column 'Bloc_Id' referencing the 'id' column on the 'blocs' table
            $table->foreignId('Bloc_Id')->nullable();
            
            // Define a nullable foreign key column 'Decal_Id' referencing the 'id' column on the 'decals' table
            $table->foreignId('Decal_Id')->nullable();
            
            // Add timestamps (created_at and updated_at columns)
            $table->timestamps();

            // Define the foreign key constraint for 'Bloc_Id', linking it to the 'id' in the 'blocs' table
            // On delete or update of the bloc, it will cascade the changes to this table
            $table->foreign('Bloc_Id')
                ->references('id')
                ->on('blocs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            // Define the foreign key constraint for 'Decal_Id', linking it to the 'id' in the 'decals' table
            // On delete or update of the decal, it will cascade the changes to this table
            $table->foreign('Decal_Id')
                ->references('id')
                ->on('decals')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is called when the migration is rolled back,
     * dropping the 'paniers' table.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'paniers' table if it exists
        Schema::dropIfExists('paniers');
    }
};
