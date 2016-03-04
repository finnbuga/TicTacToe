<?php namespace Florin\TicTacToe;

class Game
{
    const HUMAN_VS_COMPUTER    = 1;
    const COMPUTER_VS_HUMAN    = 2;
    const HUMAN_VS_HUMAN       = 3;
    const COMPUTER_VS_COMPUTER = 4;

    private $type = self::HUMAN_VS_COMPUTER;
    private $grid;

    // @todo Validate input
    public function __construct(Grid $grid, $type = self::HUMAN_VS_COMPUTER)
    {
        $this->grid = $grid;
        $this->type = $type;
    }

    public function getConfig()
    {
        return $this->grid->getConfig();
    }

    public function playTurn()
    {
        if (!$this->isComputersTurn()) {
            return;
        }

        $currentPlayer = $this->getCurrentPlayer();
        $bestPosition = $this->getBestMove($currentPlayer);

        $this->grid->markPosition($currentPlayer, $bestPosition);
    }

    private function isComputersTurn()
    {
        return $this->type == self::COMPUTER_VS_COMPUTER ||
               $this->type == self::COMPUTER_VS_HUMAN && $this->isFirstPlayersTurn() ||
               $this->type == self::HUMAN_VS_COMPUTER && $this->isSecondPlayersTurn();
    }

    private function isFirstPlayersTurn()
    {
        return $this->grid->countPositions(1) == $this->grid->countPositions(2);
    }

    private function isSecondPlayersTurn()
    {
        return !$this->isFirstPlayersTurn();
    }

    private function getCurrentPlayer()
    {
        return $this->isFirstPlayersTurn() ? 1 : 2;
    }

    private function getBestMove($player)
    {
        return 1;
    }
}