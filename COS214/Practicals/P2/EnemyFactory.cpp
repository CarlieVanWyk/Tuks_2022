#include <iostream>
#include <string>
#include "EnemyFactory.h"
using namespace std;

//protected
string EnemyFactory::getName(string enemyType) {
    int size = 5;
    string randomSnakeNames[size] = {"Saul" , "Sarie" ,"Silly", "Sally", "Susan"};
    string randomGorillaNames[size] = {"Garry" , "Gerald" ,"Gooner", "Guy", "George"};
    string randomJaguarNames[size] = {"Jared" , "Josh" ,"John", "Jake", "Jerry"};
    string randomCannibalNames[size] = {"Carl" , "Catie" ,"Conner", "Charlie", "Chelsey"};

    srand(time(0));
    int index = (rand() % (size-1)) + 0;

    if(enemyType == "snake") {
        return randomSnakeNames[index];
    }

    if(enemyType == "gorilla") {
        return randomGorillaNames[index];
    }

    if(enemyType == "jaguar") {
        return randomJaguarNames[index];
    }

     if(enemyType == "cannibal") {
        return randomCannibalNames[index];
    }

    string noReturn = "no name found";

    return noReturn;
}

//public
EnemyFactory::EnemyFactory() {
    this->product = 0;
}
EnemyFactory::~EnemyFactory() {
    if(product != 0) {
        product = 0;
    }
}
        
// void EnemyFactory::anOperation() {
//     this->product = this->createEnemy(string attack, string defense);
// }