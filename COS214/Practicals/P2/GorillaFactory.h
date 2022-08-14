#ifndef GORILLAFACTORY_H
#define GORILLAFACTORY_H

#include <iostream>
#include <string>
#include <random>
#include "Enemy.h"
#include "EnemyFactory.h"
#include "Gorilla.h"
using namespace std;

class GorillaFactory : public EnemyFactory{
    private:
        Gorilla * newGorilla;
        string gorillaName;
    protected:
        
    public:
        GorillaFactory();
        Enemy* createEnemy(string attack, string defense);

};

#endif