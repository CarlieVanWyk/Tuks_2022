#ifndef AGILEBATTLESTATE_H
#define AGILEBATTLESTATE_H

#include <iostream>
#include <string>
#include "BattleState.h"
using namespace std;

class AgileBattleState : public BattleState
{
    protected:
        string battleStyle;         
    public:
        AgileBattleState();

        int handle(string nameOfPokemon, int damage);
        // string getBattleStyle();

};

#endif