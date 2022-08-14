#include <iostream>
#include "SnakeFactory.h"

SnakeFactory::SnakeFactory() :
    EnemyFactory() {
        
}

Enemy* SnakeFactory::createEnemy(string attack, string defense) {

    default_random_engine generator;
    normal_distribution<double> distribution(6.0, 1.0);
    int theHP = distribution(generator);
    int theDamage = 2;
    Enemy * newSnake = new Snake(theHP, attack, theDamage, defense, attack);

    this->snakeName = this->getName("snake");
    cout << "The snakes name is: " << this->snakeName << endl;
    // newSnake->attack();
    // SquadMember * sm1 = new SquadMember(10, 5, "TheOne");
    // newSnake->attack(*sm1);

    return newSnake;
}

