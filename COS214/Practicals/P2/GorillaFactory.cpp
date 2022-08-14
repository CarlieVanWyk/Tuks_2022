#include <iostream>
#include "GorillaFactory.h"

GorillaFactory::GorillaFactory() :
    EnemyFactory() {
        
}

Enemy* GorillaFactory::createEnemy(string attack, string defense) {

    int choices[2] = {4 , 12};
    srand(time(0));
    int index = (rand() % (1)) + 0;
    int theHP = choices[index];
    int theDamage = 1;
    Enemy * newGorilla = new Gorilla(theHP, attack, theDamage, defense, attack);

    this->gorillaName = this->getName("gorilla");
    cout << "The gorilla's name is: " << this->gorillaName << endl;

    return newGorilla;
}

