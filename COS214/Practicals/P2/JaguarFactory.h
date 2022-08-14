#ifndef JAGUARFACTORY_H
#define JAGUARFACTORY_H

#include <iostream>
#include <string>
#include "Enemy.h"
#include "EnemyFactory.h"
#include "Jaguar.h"
using namespace std;

class JaguarFactory : public EnemyFactory{
    private:
        Jaguar * newJaguar;
        string jaguarName;
    protected:
        
    public:
        JaguarFactory();
        Enemy* createEnemy(string attack, string defense);

};

#endif