<?php

namespace Gii\ModuleOrganization\Commands;

class InstallMakeCommand extends EnvironmentCommand{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module-organization:install';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command ini digunakan untuk installing awal organization module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provider = 'Gii\ModuleOrganization\ModuleOrganizationServiceProvider';

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'migrations'
        ]);
        $this->info('✔️  Created migrations');

        $migrations = $this->scanMigration();
        $migrations = $this->arrayValues($this->mapArray(function($migration){
            return 'database\\'.explode('\\database\\',$migration)[1];
        }, $migrations));
        $this->callSilent('migrate', [
            '--path' => $migrations
        ]);
        $this->info('✔️  Module Card Identities tables migrated');

        $this->comment('gii/module-organization installed successfully.');
    }
}