<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Traits\Island;

class IslandController extends Controller
{
    use Island; //include calculation utilities
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $islandCount = $this->countIslands($map = $this->newMap(5, 5));

        // Format in row / column format and return json
        $json = '<pre>' . preg_replace("/\[\s+(\d+),\n\s+(\d+)\,\n\s+(\d+)\,\n\s+(\d+)\,\n\s+(\d+)\s+\]/", "[$1,$2,$3,$4,$5]", 
            collect(['map' => $map, 'islands' => $islandCount])->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        ) . '</pre>';

        $prettyMap = $this->prettyifyMap($map);
        
        //return response($json)->header('Content-Type', 'application/json');

        return view('islands.index', compact('json', 'prettyMap'));
    }
}