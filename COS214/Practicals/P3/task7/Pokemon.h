#ifndef POKEMON_H
#define POKEMON_H

#include <string>
#include <iostream>
#include "BattleState.h"
#include "NormalBattleState.h"
#include "AgileBattleState.h"
#include "StrongBattleState.h"
#include "PlayStyle.h"
using namespace std;

class Pokemon
{
    private:
        BattleState* battleState;
        PlayStyle* playStyle;
        string name;
        int HP;
        int damage;
    
    public:
        Pokemon(string name, int HP, int damage, PlayStyle* ps);

        //state
        void selectBattleState();

        //strategy
        int attack();
        void setPlayStyle(PlayStyle* ps);
        void takeDamage(int damage);

};

#endif
