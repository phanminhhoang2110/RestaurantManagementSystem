<?php

namespace App\Http\Services;

use App\Models\Table;

class TableService extends BaseService {

    public function getAllTablesService(){
        $tables = Table::all();
        return $this->successResultWithData($tables);
    }

}
