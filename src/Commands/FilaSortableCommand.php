<?php

namespace IbrahimBougaoua\FilaSortable\Commands;

use Illuminate\Console\Command;

class FilaSortableCommand extends Command
{
    public $signature = 'filasortable';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
