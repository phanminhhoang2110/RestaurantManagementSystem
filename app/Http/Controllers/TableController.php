<?php

namespace App\Http\Controllers;

use App\Http\Services\TableService;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct(TableService $tableService)
    {
        $this->service = $tableService;
    }

    function addTables(){
        for($i = 0;$i<20;$i++){
            $number = $i + 1;
            $table = new Table();
            $table->name = 'Bàn ' . $number;
            $table->code = 'table-'. $number;
            $table->save();
        }
    }

    function getAllTables(){
        return $this->service->getAllTablesService();
    }
}
