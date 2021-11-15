<?php

use Illuminate\Database\Migrations\Migration;
use App\Services\Command\RunnerInterface;
use Illuminate\Support\Facades\Artisan;

class SeedGuestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'SeedGuestData',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
