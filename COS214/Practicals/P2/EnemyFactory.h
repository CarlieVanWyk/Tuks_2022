#ifndef ENEMYFACTORY_H
#define ENEMYFACTORY_H

#include <iostream>
#include <string>
#include <random>
#include "Enemy.h"
using namespace std;

class EnemyFactory {
    private:
        Enemy * product;
    
    protected:
        string getName(string);

    public:
        EnemyFactory();
        virtual ~EnemyFactory();
        virtual Enemy* createEnemy(string attack, string defense) = 0;
        // void anOperation();

};

#endif