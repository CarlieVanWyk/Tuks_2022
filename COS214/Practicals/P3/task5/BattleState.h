#ifndef BATTLESTATE_H
#define BATTLESTATE_H

#include <iostream>
#include <string>
using namespace std;

class BattleState
{
    protected:
        string battleStyle;         //"normal" or "agile" or "strong"
    public:
        virtual int handle(string nameOfPokemon, int damage) = 0;
        string getBattleStyle();

};

#endif