<?php

namespace Cellar\Console\Commands;

use Illuminate\Console\Command;
use App;
use File;

class MakeModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cellar:models
		{--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make models for CellarTracker data.';
	
	protected $modelNamespace = 'CellarTracker';

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
			
			$key = camel_case($file);
			$file = studly_case($file);
			
			if ($key == 'list') { $key = 'wineList'; $file = 'WineList'; }
			
            $relations[$key] = $this->modelNamespace.'\\'.$file;
        }

        unset($relations['tag']);

		File::makeDirectory(app_path($this->modelNamespace), 0755, true, true);
		
        foreach ($files as $file) {

            $model = $this->modelNamespace.'\\'.studly_case($file->getBaseName('.'.$file->getExtension()));
			if ($model == $this->modelNamespace.'\\List') { $model = $this->modelNamespace.'\\WineList'; }
			
            $table = 'ct_'.snake_case($file->getBaseName('.'.$file->getExtension()));
			if ($table == 'ct_list') { $table = 'ct_wine_list'; }
			
            $modelPath = app_path(str_replace('\\','/',$model).'.php');

            if (File::exists($modelPath)) {
                if ($this->option('force') || $this->confirm('File ['.$modelPath.'] already exists.'.PHP_EOL.' Do you wish to continue?')) {
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
            '    protected $table = \''.$table.'\';',
            null,
            '    protected $guarded = [\'id\', \'deleted_at\', \'created_at\', \'updated_at\'];',
			null,
            '    use SoftDeletes;',
            null,
            '    public function user()',
            '    {',
            '        return $this->belongsTo(\''.App::getNamespace().'User\');',
            '    }',
            ];

            if ($model != $this->modelNamespace.'\\'.'Tag') {
                foreach ($relations as $relation => $modelName) {
                    if ($modelName != $model && $modelName != $this->modelNamespace.'\\'.'Tag') {

                        $relationship = $modelName == $this->modelNamespace.'\\'.'Inventory' ? 'hasMany' : 'hasOne';
/* 						$relation = $relationship == 'hasMany' ? str_plural($relation) : str_singular($relation); */

                        $lines[] = null;
                        $lines[] = '    public function '.$relation.'()';
                        $lines[] = '    {';
                        $lines[] = '        return $this->'.$relationship.'(\''.App::getNamespace().$modelName.'\', \'i_wine\', \'i_wine\');';
                        $lines[] = '    }';
                    }
                }
            }

            $contents = str_replace('    //', implode(PHP_EOL, $lines), $contents);

            File::put($modelPath, $contents);

        }

    }

}
