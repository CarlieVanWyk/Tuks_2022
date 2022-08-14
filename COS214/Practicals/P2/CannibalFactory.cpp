#include <iostream>
#include "CannibalFactory.h"

CannibalFactory::CannibalFactory() :
    EnemyFactory() {
        
}

Enemy* CannibalFactory::createEnemy(string attack, string defense) {

    int choices[2] = {8 , 30};
    srand(time(0));
    int index = (rand() % (1)) + 0;
    int theHP = choices[index];
    int theDamage = 6;
    Enemy * newCannibal = new Cannibal(theHP, attack, theDamage, defense, attack);

    this->cannibalName = this->getName("cannibal");
    cout << "The cannibal's name is: " << this->cannibalName << endl;

    return newCannibal;
}

