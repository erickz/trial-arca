<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use Elasticsearch\Client;

class ReindexElasticCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex-elastic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes the companies to Elasticsearch';

    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();

        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Indexing the companies table. This might take a while...');

        foreach (Company::cursor() as $company)
        {
            $this->elasticsearch->index([
                'index' => $company->getSearchIndex(),
                'type' => $company->getSearchType(),
                'id' => $company->getKey(),
                'body' => $company->toSearchArray(),
            ]);

            // PHPUnit-style feedback
            $this->output->write('.');
        }

        $this->info("\nDone!");

        return 0;
    }
}
