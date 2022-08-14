#include <iostream>
#include "JaguarFactory.h"

JaguarFactory::JaguarFactory() :
    EnemyFactory() {
        
}

Enemy* JaguarFactory::createEnemy(string attack, string defense) {

    default_random_engine generator;
    normal_distribution<double> distribution(10.0, 3.0);
    int theHP = distribution(generator);
    int theDamage = 4;
    Enemy * newJaguar = new Jaguar(theHP, attack, theDamage, defense, attack);

    this->jaguarName = this->getName("jaguar");
    cout << "The jaguar's name is: " << this->jaguarName << endl;
    // newSnake->attack();
    // SquadMember * sm1 = new SquadMember(10, 5, "TheOne");
    // newSnake->attack(*sm1);

    return newJaguar;
}

