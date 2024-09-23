<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method defines the structure of the 'prelevements' table.
     * It is called when the migration is executed.
     *
     * @return void
     */
    public function up()
    {
        // Create 'prelevements' table
        Schema::create('prelevements', function (Blueprint $table) {
            // Define an auto-incrementing primary key (id)
            $table->id();
            
            // Define an integer column 'NumeroAnapath' (could be an identifier or code for the prélèvement)
            $table->integer('NumeroAnapath');
            
            // Define a date column 'DateManipulation' (date when the sample was handled or processed)
            $table->date('DateManipulation');
            
            // Define a string column 'Type' (to store the type of prélèvement)
            $table->string('Type');
            
            // Define a foreign key column 'User_Id' referencing the 'id' column on the 'users' table
            $table->foreignId('User_Id');
            
            // Define a text column 'Description' that is nullable (for optional additional information)
            $table->text('Description')->nullable();
            
            // Define an integer column 'NombreBiopsie' (number of biopsies) that is nullable
            $table->integer('NombreBiopsie')->nullable();
            
            // Define an integer column 'NombreBlocs' (number of blocks)
            $table->integer('NombreBlocs');
            
            // Add timestamps (created_at and updated_at columns)
            $table->timestamps();

            // Define the foreign key constraint for 'User_Id', linking it to the 'id' in the 'users' table
            // On delete or update of the user, it will cascade the changes to this table
            $table->foreign('User_Id')
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
     * dropping the 'prelevements' table.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'prelevements' table if it exists
        Schema::dropIfExists('prelevements');
    }
};
