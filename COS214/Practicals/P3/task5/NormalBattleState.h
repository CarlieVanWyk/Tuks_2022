#ifndef NORMALBATTLESTATE_H
#define NORMALBATTLESTATE_H

#include <iostream>
#include <string>
#include "BattleState.h"
using namespace std;

class NormalBattleState : public BattleState
{
    protected:
        string battleStyle;         
    public:
        NormalBattleState();

        int handle(string nameOfPokemon, int damage);
        // string getBattleStyle();

};

#endif