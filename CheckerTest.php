<?php
/**
 * File for Sudoku Checker Class UnitTesting
 *
 * PHP version 5.5
 *
 * @category Unit_Testing
 * @package  Sudoku
 * @author   bondoq <bondoq@eventtus.com>
 * @license  Apache <http://www.apache.org/licenses/LICENSE-2.0.html>
 * @link     <http://github/bondoq>
 */


require 'Checker.php';

/**
 * Class Checker
 * used to Check Sudoku Puzzle Solution
 *
 * @category Unit_Testing
 * @package  Sudoku
 * @author   bondoq <bondoq@eventtus.com>
 * @license  Apache <http://www.apache.org/licenses/LICENSE-2.0.html>
 * @link     <http://github/bondoq>
 */
class CheckerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Checker Instant of Checker Class
     */
    protected $checker;

    /**
     * Correct PuzzleOne TestCase
     *
     * @var array()
     */
    protected $puzzleOne;

    /**
     * Another Correct Puzzle TestCase
     *
     * @var array()
     */
    protected $puzzleTwo;

    /**
     * Wrong Puzzle TestCase
     *
     * @var array()
     */
    protected $puzzleThree;


    /**
     * Setup Checker Class with two Puzzles as TestCase
     *
     * @return void
     */
    public function setUp()
    {
        $this->puzzleOne = [
            [8, 5, 7, 4, 1, 9, 2, 3, 6],
            [3, 6, 2, 8, 7, 5, 4, 1, 9],
            [4, 9, 1, 2, 3, 6, 7, 5, 8],
            [1, 3, 9, 7, 2, 4, 6, 8, 5],
            [7, 4, 6, 1, 5, 8, 9, 2, 3],
            [2, 8, 5, 6, 9, 3, 1, 7, 4],
            [6, 7, 4, 5, 8, 1, 3, 9, 2],
            [5, 1, 3, 9, 6, 2, 8, 4, 7],
            [9, 2, 8, 3, 4, 7, 5, 6, 1],
        ];

        $this->puzzleTwo = [
            [5, 7, 4, 2, 9, 6, 1, 3, 8],
            [3, 8, 6, 7, 1, 5, 2, 4, 9],
            [9, 2, 1, 3, 4, 8, 6, 5, 7],
            [2, 4, 5, 1, 8, 3, 9, 7, 6],
            [7, 9, 3, 6, 5, 2, 8, 1, 4],
            [6, 1, 8, 9, 7, 4, 5, 2, 3],
            [4, 3, 9, 8, 2, 1, 7, 6, 5],
            [8, 6, 2, 5, 3, 7, 4, 9, 1],
            [1, 5, 7, 4, 6, 9, 3, 8, 2],
        ];

        $this->puzzleThree = [
            [5, 7, 4, 2, 9, 6, 1, 3, 5],
            [3, 8, 6, 7, 1, 5, 2, 4, 9],
            [9, 2, 1, 3, 4, 8, 6, 5, 7],
            [2, 4, 5, 1, 8, 3, 9, 7, 6],
            [7, 9, 3, 6, 5, 2, 8, 1, 4],
            [6, 1, 8, 9, 7, 4, 5, 2, 3],
            [4, 3, 9, 8, 2, 1, 7, 6, 5],
            [8, 6, 2, 5, 3, 7, 4, 9, 1],
            [1, 5, 7, 4, 6, 9, 3, 8, 2],
        ];
        $this->checker = new Checker($this->puzzleOne);
    }


    /**
     * Unit test for SubArray Function in Checker Class
     *
     * @return void
     */
    public function testCheckerSubArray()
    {
        // Check Horizontal Sub-Array.
        $linear = $this->checker->subArray(0, 8, 0, 0);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 5, 7, 4, 1, 9, 2, 3, 6], $linear);

        // Check Grid Sub-Array.
        $linear = $this->checker->subArray(0, 2, 0, 2);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 5, 7, 3, 6, 2, 4, 9, 1], $linear);

        // Check Vertical Sub-Array.
        $linear = $this->checker->subArray(0, 0, 0, 8);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 3, 4, 1, 7, 2, 6, 5, 9], $linear);

    }


    /**
     * Unit Test for PrepareLinearArrays function in Checker Class
     *
     * @return void
     */
    public function testPrepareLinearArrays()
    {
        $arrays = $this->checker->prepareLinearArrays();
        $this->assertInternalType('array', $arrays);
        $this->assertEquals(27, count($arrays));
    }


    /**
     * Unit Test for Check function in Checker Class
     *
     * @return void
     */
    public function testCheckerClass()
    {
        $result = $this->checker->setPuzzle($this->puzzleOne)->check();
        $this->assertEquals(true, $result);

        $result = $this->checker->setPuzzle($this->puzzleTwo)->check();
        $this->assertEquals(true, $result);

        $result = $this->checker->setPuzzle($this->puzzleThree)->check();
        $this->assertEquals(false, $result);
    }

}

?>