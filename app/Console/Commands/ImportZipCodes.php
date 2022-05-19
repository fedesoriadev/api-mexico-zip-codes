<?php

namespace App\Console\Commands;

use App\Enums\ZoneType;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipcodes:import {--path= : Path to .csv or .txt file to import}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import zip codes from https://www.correosdemexico.gob.mx/ in CSV or TXT to Database';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \League\Csv\Exception
     */
    #[NoReturn] public function handle(): void
    {
        $start = now();

        $path = $this->option('path') ?? storage_path('app/CPdescarga.txt');

        $this->info(PHP_EOL . "Reading data from $path");

        $reader = Reader::createFromPath($path);
        $reader->setDelimiter('|');
        $reader->setHeaderOffset(1);

        $stmt = Statement::create()
            ->offset(2);
        $records = $stmt->process($reader);

        $total = $records->count();
        $this->info("Records to process: $total");

        $this->withProgressBar(collect($records), function ($row) {
            $federalEntity = FederalEntity::firstOrCreate(
                ['key' => intval($row['c_estado'])],
                [
                    'key'  => $row['c_estado'],
                    'name' => $row['d_estado'],
                    'code' => $row['c_CP']
                ]
            );

            $municipality = Municipality::firstOrCreate(
                ['key' => intval($row['c_mnpio'])],
                [
                    'key'  => $row['c_mnpio'],
                    'name' => $row['D_mnpio']
                ]
            );

            $zipCode = ZipCode::firstOrCreate(
                [
                    'zip_code'        => $row['d_codigo'],
                    'municipality_id' => $municipality->id
                ],
                [
                    'zip_code'          => $row['d_codigo'],
                    'locality'          => $row['d_ciudad'],
                    'federal_entity_id' => $federalEntity->id,
                    'municipality_id'   => $municipality->id,
                ]
            );

            $settlementType = SettlementType::firstOrCreate(
                ['name' => $row['d_tipo_asenta']],
                ['name' => $row['d_tipo_asenta']]
            );

            Settlement::create([
                'key'                => $row['id_asenta_cpcons'],
                'name'               => $row['d_asenta'],
                'zone_type'          => ZoneType::from(strtoupper($row['d_zona']))->value,
                'settlement_type_id' => $settlementType->id,
                'zip_code_id'        => $zipCode->id
            ]);
        });

        $time = $start->diffInMinutes(now(), false);
        $this->info(PHP_EOL . "Processed in $time minutes");
    }
}
