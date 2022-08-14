#ifndef SNAKEFACTORY_H
#define SNAKEFACTORY_H

#include <iostream>
#include <string>
#include "Enemy.h"
#include "EnemyFactory.h"
#include "Snake.h"
using namespace std;

class SnakeFactory : public EnemyFactory{
    private:
        Snake * newSnake;
        string snakeName;
    protected:
        
    public:
        SnakeFactory();
        Enemy* createEnemy(string attack, string defense);

};

#endif