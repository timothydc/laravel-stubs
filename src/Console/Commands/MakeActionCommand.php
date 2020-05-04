<?php
declare(strict_types=1);

namespace TimothyDC\LaravelStubs\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeActionCommand extends GeneratorCommand
{
    protected $signature = 'make:action {name}';
    protected $description = 'Create a new action';

    public function handle()
    {
        $this->type = $this->argument('name');

        return parent::handle();
    }

    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/action.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Actions';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the action'],
        ];
    }
}
