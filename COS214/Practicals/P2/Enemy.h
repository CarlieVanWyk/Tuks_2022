#ifndef ENEMY_H
#define ENEMY_H

#include <iostream>
#include <string>
#include "SquadMember.h"
using namespace std;

class Enemy {
    private: 
        // virtual bool hitSquadMember(SquadMember * z) = 0 ;
        // virtual void celebrate() = 0;
        // virtual bool getHit(SquadMember * z) = 0 ;
        // virtual void die() = 0;
    protected:
        virtual bool hitSquadMember(SquadMember * z) = 0 ;
        virtual void celebrate() = 0;
        virtual bool getHit(SquadMember * z) = 0 ;
        virtual void die() = 0;
        
        int HP;
        string attackMove;
        int damage;
        string defenseMove;

    public:
        Enemy();
        Enemy(int HP, string attackMove, int damage, string defenseMove);
        void attack(SquadMember);
        bool isAlive();

        

};

#endif