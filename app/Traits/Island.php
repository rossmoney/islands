<?php
namespace App\Traits;

trait Island
{
    // Size of map
    private $totalRows;
    private $totalColumns;

    // A function to check if a given quadrant (x, y) can be included in the checking of the neighbouring quadrants.
    private function isValidQuadrant(&$map, $x, $y, &$visited)
    {
        // row number is in range, column number is in range and value is 1 and not yet visited
        return ($x >= 0) && ($x < $this->totalRows) &&    
            ($y >= 0) && ($y < $this->totalColumns) &&    
            ($map[$x][$y] &&
                !isset($visited[$x][$y]));
    }
        
    private function checkNeighbouringQuadrants(&$map, $x, $y, &$visited)
    {
        // These arrays are used to get row and column numbers of the surrounding 8 neighbours of a given quadrant
        $rowNumber = [-1, -1, -1, 0,
                        0, 1, 1, 1];

        $colNumber = [-1, 0, 1, -1,
                        1, -1, 0, 1];

        // Given row = 4, col = 2

        /*3, 1
        3, 2
        3, 3
        4, 1
        4, 3
        5, 1
        5, 2
        5, 3*/
    
        // Mark this quadrant as visited
        $visited[$x][$y] = true;
    
        // Spread out checking connected neighbours
        for ($k = 0; $k < 8; $k++)
            if ($this->isValidQuadrant($map, $x + $rowNumber[$k],
                    $y + $colNumber[$k], $visited))
                $this->checkNeighbouringQuadrants($map, $x + $rowNumber[$k],
                    $y + $colNumber[$k], $visited);
    }

    public function countIslands($map)
    {
        // Make a boolean array to mark visited quadrants.
        // Initially all cells are unvisited.
        $visited = [[]];
    
        // Initialize count as 0 and traverse through all the quadrants of given map.
        $count = 0;
        for ($i = 0; $i < $this->totalRows; $i++)
            for ($j = 0; $j < $this->totalColumns; $j++)
                if ($map[$i][$j] && !isset($visited[$i][$j])) // If a quadrant with value 1 is not visited yet,
                {
                    $this->checkNeighbouringQuadrants($map, $i, $j, $visited); // then new island found
                    $count++;                   // Visit all quadrants in this island and increment island count.
                }
    
        return $count;
    }

    public function newMap($rows = 5, $columns = 5)
    {
        $map = [];

        $this->totalRows = $rows;
        $this->totalColumns = $columns;

        // Generate new islands and water (the map)
        for ($x = 0; $x < $rows; $x++)
        {
            for ($y = 0; $y < $columns; $y++)
            {
                $map[$x][$y] = rand(0, 1);
            }
        }

        return $map;
    }

    public function prettyifyMap($map)
    {
        $prettyMap = '<pre>';

        for ($x = 0; $x < $this->totalRows; $x++)
        {
            for ($y = 0; $y < $this->totalColumns; $y++)
            {
                if ($map[$x][$y])
                {
                    $map[$x][$y] = '<span class="island">' . $map[$x][$y] . '</span>';
                }

                if (!$map[$x][$y])
                {
                    $map[$x][$y] = '<span class="water">' . $map[$x][$y] . '</span>';
                }
            }
            $mapRow = implode(",", $map[$x]);
            $prettyMap .= $mapRow . '<br>';
        }

        $prettyMap .= '</pre>';
        
        return $prettyMap;
    }
}