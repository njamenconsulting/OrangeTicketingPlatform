<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$user =\App\Models\User::factory()->create();
        return [
            'title'=>$this->faker->randomElement($array = array ('Orange Money', 'Orange Bonus', 'OM Facture', 'Orange Bundle','Orange Week')),
            'phone'=>$this->faker->unique()->regexify('^(2|6)[0-9]{8}$'),
            'description'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true) ,
            'status'=>$this->faker->randomElement($array = array ('Created', 'Started', 'Canceled', 'Pending','Terminated')), // 'b',
            'started_at'=>Carbon::now() , //iso8601($max = 'now')
            'created_by'=>$this->faker->ipv4,
            'user_id'=>$this->faker->numberBetween($min = 1, $max = 15) ,

        ];
    }
}
