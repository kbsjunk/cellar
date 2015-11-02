<?php

namespace Cellar\Console\Commands;

use Illuminate\Console\Command;

use File;

class MakeModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cellar:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make models for CellarTracker data.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $files = File::allFiles(base_path('.wk/ct_tables'));

        $relations = [];

        foreach ($files as $file) {
            $file = $file->getBaseName('.'.$file->getExtension());
            $relations[camel_case($file)] = 'CT'.studly_case($file);
        }

        unset($relations['tag']);

        foreach ($files as $file) {

            $model = 'CT'.studly_case($file->getBaseName('.'.$file->getExtension()));

            $modelPath = app_path($model.'.php');

            if (File::exists($modelPath)) {
                if ($this->confirm('File ['.$modelPath.'] already exists.'.PHP_EOL.' Do you wish to continue?')) {
                    File::delete($modelPath);
                }
                else {
                    continue;
                }
            }

            $this->call('make:model', ['name' => $model]);

            $contents = File::get($modelPath);

            $contents = str_replace(
                'use Illuminate\Database\Eloquent\Model;',
                'use Illuminate\Database\Eloquent\Model;'.PHP_EOL.
                'use Illuminate\Database\Eloquent\SoftDeletes;',
                $contents);

            $lines = [
            '    use SoftDeletes;',
            null,
            '    public function user()',
            '    {',
            '        return $this->belongsTo(\'Cellar\User\');',
            '    }',
            ];

            if ($model != 'CTTag') {
                foreach ($relations as $relation => $modelName) {
                    if ($modelName != $model && $modelName != 'CTTag') {

                        $relationship = $modelName == 'CTInventory' ? 'hasMany' : 'hasOne';

                        $lines[] = null;
                        $lines[] = '    public function '.$relation.'()';
                        $lines[] = '    {';
                        $lines[] = '        return $this->'.$relationship.'(\'Cellar\\'.$model.'\', \'i_wine\', \'i_wine\');';
                        $lines[] = '    }';
                    }
                }
            }

            $contents = str_replace('    //', implode(PHP_EOL, $lines), $contents);

            File::put($modelPath, $contents);

        }

    }

}
