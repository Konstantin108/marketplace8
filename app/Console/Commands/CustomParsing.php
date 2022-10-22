<?php

namespace App\Console\Commands;

use App\Services\ParserService;
use Illuminate\Console\Command;

class CustomParsing extends Command
{
//    protected string $default = '/assets/data.xml';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'myparser {data=/assets/data.xml}';

    public ParserService $service;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run parsing';

    public function __construct(ParserService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->argument('data');
        return $this->service->setLink(asset($path))->parsing();
    }
}
