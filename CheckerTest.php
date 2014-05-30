<?php

require 'Checker.php';

class CheckerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Checker Instant of Checker Class
     */
    protected $checker;

    /**
     * @var array() Puzzle TestCase
     */
    protected $puzzleOne;

    /**
     * @var array() Another Puzzle TestCase
     */
    protected $puzzleTwo;


    /**
     * Setup Checker Class with two Puzzles as TestCase
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
        $this->checker   = new Checker($this->puzzleOne);
    }

    /**
     * Unit test for SubArray Function in Checker Class
     */
    public function testCheckerSubArray()
    {
        //check Horizontal Sub-Array
        $linear = $this->checker->subArray(0, 8, 0, 0);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 5, 7, 4, 1, 9, 2, 3, 6], $linear);

        //Check Grid Sub-Array
        $linear = $this->checker->subArray(0, 2, 0, 2);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 5, 7, 3, 6, 2, 4, 9, 1], $linear);

        //Check Vertical Sub-Array
        $linear = $this->checker->subArray(0, 0, 0, 8);
        $this->assertInternalType('array', $linear);
        $this->assertEquals([8, 3, 4, 1, 7, 2, 6, 5, 9], $linear);

    }

    /**
     * Unit Test for PrepareLinearArrays function in Checker Class
     */
    public function testPrepareLinearArrays()
    {
        $arrays = $this->checker->prepareLinearArrays();
        $this->assertInternalType('array', $arrays);
        $this->assertEquals(27, count($arrays));
    }

    /**
     * Unit Test for Check function in Checker Class
     */
    public function testCheckerClass()
    {
        $result = $this->checker->check($this->puzzleOne);
        $this->assertEquals(true, $result);

        $result = $this->checker->check($this->puzzleTwo);
        $this->assertEquals(true, $result);
    }

}

?>