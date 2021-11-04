<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Task;
use App\Models\Admin;


class DeleteTasks extends Command
{
   
    protected $signature = 'tasks:delete';
    protected $description = 'Delete all finished tasks of a chosen Admin from the database';

    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle(Request $request)
    {
        // Deletes all finished tasks, intended to be scheduled weekly
        Task::where('finished',1)->delete();
        
    }
}
