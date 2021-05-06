<?php

namespace Mandeep\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function ($table) {
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('phone');
            $table->string('profession');
            $table->string('user_role');
            $table->string('confidential');
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn([
                'date_of_birth',
                'address',
                'phone',
                'profession',
                'user_role',
                'confidential',
            ]);
        });
    }
}
