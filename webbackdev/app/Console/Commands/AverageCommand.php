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
		$copidetails = Copi::selectRaw('AVG(steak) AS steak')->selectRaw('AVG(grnd_beef) as beef')->selectRaw('AVG(sausage) as sausage')->selectRaw('AVG(fry_chick) as frychick')->selectRaw('AVG(tuna) as tuna')->selectRaw('state')->groupBy('state')->get();		
		foreach($copidetails as $copidetail){
			echo sprintf("%s : Steak (%d), Ground Beef (%d), Sausage (%d), Fried Chicken (%d), Tuna (%d)",$copidetail->state,$copidetail->steak,$copidetail->beef,$copidetail->sausage,$copidetail->frychick,$copidetail->tuna).PHP_EOL;
		}
    }
}
