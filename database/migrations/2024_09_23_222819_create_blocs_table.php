<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method defines the structure of the 'blocs' table.
     * It is called when the migration is executed.
     *
     * @return void
     */
    public function up()
    {
        // Create 'blocs' table
        Schema::create('blocs', function (Blueprint $table) {
            // Define an auto-incrementing primary key (id)
            $table->id();
            
            // Define a string column 'Reference_Bloc' for storing the reference or identifier of the block
            $table->string('Reference_Bloc');
            
            // Define a foreign key column 'Prelevement_Id' referencing the 'id' column on the 'prelevements' table
            $table->foreignId('Prelevement_Id');
            
            // Define a string column 'Commentaire' for optional comments related to the block
            $table->string('Commentaire')->nullable();
            
            // Define a text column 'Siege' for optional anatomical location or position information
            $table->text('Siege')->nullable();
            
            // Define an integer column 'Cassettes' for the number of cassettes, nullable as it may not always be provided
            $table->integer('Cassettes')->nullable();
            
            // Define an integer column 'Fragments' for the number of fragments, nullable
            $table->integer('Fragments')->nullable();
            
            // Define a string column 'Reste' with a default value of 'Non' (possibly to indicate if there are remaining samples)
            $table->string('Reste')->default('Non');
            
            // Define a string column 'Decals' with a default value of 'Non' (possibly to indicate decal processing status)
            $table->string('Decals')->default('Non');
            
            // Define a boolean column 'Import' with a default value of 0 (likely to track import status)
            $table->boolean('Import')->default(0);
            
            // Define a boolean column 'Status_D' with a default value of 0 (could represent the status of the block)
            $table->boolean('Status_D')->default(0);

            // Define the foreign key constraint for 'Prelevement_Id', linking it to the 'id' in the 'prelevements' table
            // On delete or update of the prélèvement, it will cascade the changes to this table
            $table->foreign('Prelevement_Id')
                ->references('id')
                ->on('prelevements')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            // Add timestamps (created_at and updated_at columns)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is called when the migration is rolled back,
     * dropping the 'blocs' table.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'blocs' table if it exists
        Schema::dropIfExists('blocs');
    }
};
