#ifndef SNAKE_H
#define SNAKE_H

#include <iostream>
#include <string>
#include "Enemy.h"
using namespace std;

class Snake : public Enemy {
    private:
        string primaryWeapon;
    public:
        Snake(int HP, string attackMove, int damage, string defenseMove, string priWeapon);
        bool hitSquadMember(SquadMember * z);
        void celebrate();
        bool getHit(SquadMember * z);
        void die();
};

#endif