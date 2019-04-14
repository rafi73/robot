<?php

namespace App\Helpers;

use App\Contracts\FightInterface;

class FightValidationManager
{
    /**
     * Start Robot fight.
     *
     * @param FightInterface $robotIds
     * @throws \App\Exceptions\FightService\RobotFightConflictException
     * @return bool
     */
    public function check(FightInterface $fightInterface)
    {
        return $fightInterface->validate();
    }
}