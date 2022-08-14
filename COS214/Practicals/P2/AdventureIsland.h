#ifndef ADVENTUREISLAND_H
#define ADVENTUREISLAND_H

#include <iostream>
#include <string>
#include "SquadMember.h"
#include "EnemyFactory.h"
#include "SnakeFactory.h"
#include "GorillaFactory.h"
#include "JaguarFactory.h"
#include "Enemy.h"
using namespace std;

class AdventureIsland{
    private:
        int numSquadMembers;
        SquadMember * createSquadMembers();

    public:
        AdventureIsland(int num);
        void initializeGame();
        void level2();
        void level3();
        void level4();

};

#endif