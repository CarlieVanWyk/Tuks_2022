#ifndef CANNIBAL_H
#define CANNIBAL_H

#include <iostream>
#include <string>
#include "Enemy.h"
using namespace std;

class Cannibal : public Enemy {
    private:
        string primaryWeapon;
    public:
        Cannibal(int HP, string attackMove, int damage, string defenseMove, string priWeapon);
        bool hitSquadMember(SquadMember * z);
        void celebrate();
        bool getHit(SquadMember * z);
        void die();
};

#endif