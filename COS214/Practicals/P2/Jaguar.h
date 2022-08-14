#ifndef JAGUAR_H
#define JAGUAR_H

#include <iostream>
#include <string>
#include "Enemy.h"
using namespace std;

class Jaguar : public Enemy {
    private:
        string primaryWeapon;
    public:
        Jaguar(int HP, string attackMove, int damage, string defenseMove, string priWeapon);
        bool hitSquadMember(SquadMember * z);
        void celebrate();
        bool getHit(SquadMember * z);
        void die();
};

#endif