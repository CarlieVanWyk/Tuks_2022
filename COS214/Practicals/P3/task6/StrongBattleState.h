#ifndef STRONGBATTLESTATE_H
#define STRONGBATTLESTATE_H

#include <iostream>
#include <string>
#include "BattleState.h"
using namespace std;

class StrongBattleState : public BattleState
{
    protected:
        string battleStyle;         
    public:
        StrongBattleState();

        int handle(string nameOfPokemon, int damage);
        // string getBattleStyle();

};

#endif