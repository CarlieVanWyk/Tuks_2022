#ifndef POKEMON_H
#define POKEMON_H

#include <string>
#include <iostream>
#include "BattleState.h"
#include "NormalBattleState.h"
#include "AgileBattleState.h"
#include "StrongBattleState.h"
using namespace std;

class Pokemon
{
    private:
        BattleState* battleState;
        string name;
        int HP;
        int damage;
    
    public:
        void selectBattleState();
};

#endif
