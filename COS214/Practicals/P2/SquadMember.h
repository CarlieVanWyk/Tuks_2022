#include <iostream>
#include <string>
using namespace std;

#ifndef SQUADMEMBER_H
#define SQUADMEMBER_H

class SquadMember {
    private:
        int HP;
        int damage;
        string name;
        bool isAlive;

    public:
        SquadMember();
        SquadMember(int HP, int damage, string name);

        void setHP(int val);
        void setDamage(int val);
        void setAlive(bool val);
        int getHP();
        int getDamage();
        bool getAlive();
        string getName();

        int takeDamage(int damageDone);

        SquadMember* clone(string newName);
        ~SquadMember();            
    
};

#endif