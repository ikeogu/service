<?php

use Illuminate\Database\Seeder;

class PaymentPlan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\PaymentPlan::insert([
        'name'=> 'Basic Plan',
        'description'=> 'This plan has less previledge and costs less'
       ]);
       App\PaymentPlan::insert([
        'name'=> 'Economy Plan',
        'description'=> 'This plan has little  previledge and costs more than the basic plan'
       ]);
       App\PaymentPlan::insert([
        'name'=> 'Advance Plan',
        'description'=> 'This plan has more previledges and costs more than other plans.'
       ]);
    }
}
