#ifndef GORILLA_H
#define GORILLA_H

#include <iostream>
#include <string>
#include "Enemy.h"
using namespace std;

class Gorilla : public Enemy {
    private:
        string primaryWeapon;
    public:
        Gorilla(int HP, string attackMove, int damage, string defenseMove, string priWeapon);
        bool hitSquadMember(SquadMember * z);
        void celebrate();
        bool getHit(SquadMember * z);
        void die();
};

#endif