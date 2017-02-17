<?php
require __DIR__.'/Demo/Board.php';

$board = new Board();
$restart = true;

echo "Welcome to Tic Tac Toe! \n\n";
$board->printBoard();

while ($restart) {
    $row = null;
    $col = null;
    $currentPlayer = $board->getCurrentPlayer() === -1 ? 1 : 2;

    if ($currentPlayer === 1) {
        while ($row === null || $col === null || !$board->isMovePossible($row, $col)) {
            $row = readline("Player " . $currentPlayer . ", select the row: ");
            $col = readline("Player " . $currentPlayer . ", select the col: ");
        }

        $board->makePlayerMove($row, $col);
    } else {
        $board->makeAiMove();
    }

    echo "\n\n";

    $board->printBoard();

    if (!$board->hasMovesLeft()) {
        echo 'No more moves.';
        $restart = false;
    }

    if ($board->hasPlayerWon(-1)) {
        // player 1
        echo 'Player 1 has won!';
        $restart = false;

    }

    if ($board->hasPlayerWon(1)) {
        // player 2
        echo 'Player 2 has won!';
        $restart = false;
    }
}