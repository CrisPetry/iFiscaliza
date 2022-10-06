<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
class CreatePasswordResetsTable extends Migration
=======
<<<<<<< HEAD
return new class extends Migration
=======
class CreatePasswordResetsTable extends Migration
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
};
=======
}
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
