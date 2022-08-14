#ifndef CANNIBALFACTORY_H
#define CANNIBALFACTORY_H

#include <iostream>
#include <string>
#include <random>
#include "Enemy.h"
#include "EnemyFactory.h"
#include "Cannibal.h"
using namespace std;

class CannibalFactory : public EnemyFactory{
    private:
        Cannibal * newCannibal;
        string cannibalName;
    protected:
        
    public:
        CannibalFactory();
        Enemy* createEnemy(string attack, string defense);

};

#endif