<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\State;
use App\Copi;


class AverageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'State:average';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'State Average Calculation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {		
		$states = State::orderBy('state')->get();		
		foreach($states as $state){			
			if(count($state->copis) > 0){
				$copidetails = Copi::selectRaw('round(AVG(steak),0) AS steak')->selectRaw('round(AVG(grnd_beef),0) as beef')->selectRaw('round(AVG(sausage),0) as sausage')->selectRaw('round(AVG(fry_chick),0) as frychick')->selectRaw('round(AVG(tuna),0) as tuna')->where('state', '=', $state->state)->groupBy('state')->first();
				echo sprintf("%s : Steak (%d), Ground Beef (%d), Sausage (%d), Fried Chicken (%d), Tuna (%d)",$state->state,$copidetails->steak,$copidetails->beef,$copidetails->sausage,$copidetails->frychick,$copidetails->tuna).PHP_EOL;
			}
		}
    }
}
