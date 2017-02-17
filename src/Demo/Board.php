<?php
namespace Demo;

/**
 * Class Board
 * @package Demo
 */
class Board
{
    private $fieldSize;
    private $grid;

    private $currentPlayer;

    function __construct($fieldSize = 3, $currentPlayer = 0)
    {
        $this->fieldSize = $fieldSize;
        $this->currentPlayer = $currentPlayer;
        $this->initializeGrid();
    }

    public function initializeGrid() {
        $this->grid = array();

        for ($i = 0; $i < $this->fieldSize; $i++) {
            $this->grid[$i] = array();
            for ($j = 0; $j < $this->fieldSize; $j++) {
                $this->grid[$i][$j] = null;
            }
        }
    }

    public function getFieldValue($row, $col) {
        return $this->grid[$row][$col];
    }

    public function setFieldValue($row, $col, $value) {
        $this->grid[$row][$col] = $value;
    }

    public function hasPlayerWon($player) {
        $winningScore = $player * 3;

        $diagonalSum1 = 0;
        $diagonalSum2 = 0;

        for ($row = 0; $row < $this->getFieldSize(); $row++) {
            $rowSum = 0;
            $colSum = 0;

            for ($col = 0; $col < $this->getFieldSize(); $col++) {
                $rowSum += $this->getFieldValue($row, $col);
                $colSum += $this->getFieldValue($col, $row);
            }

            $diagonalSum1 += $this->getFieldValue($row, $this->getFieldSize() - 1 - $row);
            $diagonalSum2 += $this->getFieldValue($row, $row);

            if ($rowSum === $winningScore || $colSum === $winningScore) {
                return true;
            }
        }

        return ($diagonalSum1 === $winningScore || $diagonalSum2 === $winningScore);
    }

    public function isMovePossible($row, $col) {
        return $this->grid[$row][$col] === null;
    }

    public function makePlayerMove($row, $col) {
        if (!$this->isMovePossible($row, $col)) {
            return;
        }

        $this->setFieldValue($row, $col, $this->currentPlayer);
        $this->currentPlayer = $this->currentPlayer === 0 ? 1 : 0;
    }
    /**
     * @return int
     */
    public function getFieldSize()
    {
        return $this->fieldSize;
    }

    /**
     * @return void
     */
    public function getGrid()
    {
        return $this->grid;
    }
}