<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

use App\employees;

class SETempdata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SETempdat{emp_id}{epm_Name}{ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Employee Details';

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
        try{
            $employee=employees::create([
                'emp_id'=>$this->argument('emp_id'),
                'epm_Name'=>$this->argument('epm_Name'),
                'ip_address'=>$this->argument('ip_address'),
                
             ]);

        }catch(QueryException $ex){ 
            $this->error('error:Failed to insert employee information'); 
            return false;
        }

        $this->info('Added'. $employee->emp_id);
    }
}
