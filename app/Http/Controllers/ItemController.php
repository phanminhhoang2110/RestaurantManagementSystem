<?php

namespace App\Http\Controllers;

use App\Http\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(ItemService $itemService)
    {
        $this->service = $itemService;
    }

    function getAllItems(Request $request){
        $this->service->getAllItemsService();
    }
}
