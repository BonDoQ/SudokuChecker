<?php

/**
 * File for Sudoku Checker Class
 *
 * PHP version 5.5
 *
 * @category Programming_Technique
 * @package  Sudoku
 * @author   bondoq <bondoq@eventtus.com>
 * @license  Apache <http://www.apache.org/licenses/LICENSE-2.0.html>
 * @link     <http://github/bondoq>
 */

/**
 * Class Checker
 * used to Check Sudoku Puzzle Solution
 *
 * @category Programming_Technique
 * @package  Sudoku
 * @author   bondoq <bondoq@eventtus.com>
 * @license  Apache <http://www.apache.org/licenses/LICENSE-2.0.html>
 * @link     <http://github/bondoq>
 */
class Checker
{

    /**
     * @var array() Puzzle to Check Solution
     */
    protected $puzzle;


    /**
     * Checker Constructor
     *
     * @param array() $puzzle Puzzle to Check Solution
     */
    public function __construct($puzzle)
    {
        $this->puzzle = $puzzle;

    }


    /**
     * Set Checker Puzzle
     *
     * @param array() $puzzle Sudoku Puzzle
     *
     * @return Checker Checker Instance for Chaining
     */
    public function setPuzzle($puzzle)
    {
        $this->puzzle = $puzzle;
        return $this;

    }


    /**
     * extract sub of a Puzzle into linear array
     *
     * @param Int $xStart X-axis Start Position
     * @param Int $xEnd   X-axis End Position
     * @param Int $yStart Y-axis Start Position
     * @param Int $yEnd   Y-axis End Position
     *
     * @return array() the linear array
     */
    public function subArray($xStart, $xEnd, $yStart, $yEnd)
    {
        $linearArray = [];
        for ($y = $yStart; $y <= $yEnd; $y++) {
            for ($x = $xStart; $x <= $xEnd; $x++) {
                $linearArray[] = $this->puzzle[$y][$x];
            }
        }

        return $linearArray;

    }


    /**
     * Convert Sudoku Matrix to array of linear arrays to check duplicates
     *
     * @return array LinearArrays to check for Puzzle
     */
    public function prepareLinearArrays()
    {
        $linear = [];
        for ($r = 0; $r < 9; $r++) {
            // Vertical Linear.
            $linear[] = $this->subArray($r, $r, 0, 8);

            // Horizontal Linear.
            $linear[] = $this->subArray(0, 8, $r, $r);

            if (($r % 3) === 0) {
                // Upper Small Square.
                $linear[] = $this->subArray($r, ($r + 2), 0, 2);

                // Middle Small Square.
                $linear[] = $this->subArray($r, ($r + 2), 3, 5);

                // Lower Small Square.
                $linear[] = $this->subArray($r, ($r + 2), 6, 8);
            }
        }

        return $linear;

    }


    /**
     * Check Sudoku Puzzle Solution
     *
     * @return bool
     */
    public function check()
    {
        $linear = $this->prepareLinearArrays();
        foreach ($linear as $array) {
            if (count(array_unique($array)) < count($array)) {
                return false;
            }
        }

        return true;

    }


}

?>
