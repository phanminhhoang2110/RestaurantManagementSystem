<?php

namespace App\Http\Services;

use App\Models\Item;

class ItemService extends BaseService
{
    public function getAllItemsService(){
        $item = Item::all();
        return $this->successResultWithData($item);
    }
}
