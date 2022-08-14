#include "AdventureIsland.h"
#include <iostream>

AdventureIsland::AdventureIsland(int num){
    this->numSquadMembers = num;
}

SquadMember * AdventureIsland::createSquadMembers() {
    int size = this->numSquadMembers;
    SquadMember SM[size];

    if(size != 0) {
        string players[size];

        //create names for the players
        for(int i = 0; i < size; i++) {
            players[i] = "Player-" + to_string(i);
        }

        //populate SM array:
        for(int i = 0; i < size; i++) {
            SM[i] = SquadMember(5, 1, players[i]);
        }

        // test names:
        // for(int i = 0; i < size; i++) {
            // cout << SM[i].getName() << endl;
        // }

        // return &*SM;
    }
    else {
        cout << "Not able to play zero players" << endl;

        // return NULL;
    }

    return NULL;
}  

void AdventureIsland::initializeGame() {
    cout <<" LEVEL 1 " << endl;

    //create squadmember:
    int size = this->numSquadMembers;
    SquadMember * SM[size];

    if(size != 0) {
        string players[size];

        //create names for the players
        for(int i = 0; i < size; i++ ) {
            players[i] = "Player-" + to_string(i);
        }

        //populate SM array:
        SM[0] = new SquadMember(6, 2, players[0]);
        for(int i = 1; i < size; i++ ) {
            SM[i] = SM[0]->clone(players[i]);
        }
    }
    else {
        cout << "Not able to play zero players" << endl;
    }



    //create enemy:
    EnemyFactory * level1 = new SnakeFactory();
    Enemy * level1_Snake = level1->createEnemy("hiss" , "curl up");

    //attack:
    for(int i = 0; i < this->numSquadMembers ; i++) {
        if(level1_Snake->isAlive() == true) {
            level1_Snake->attack(*SM[i]);
        }
    }

    if(level1_Snake->isAlive() == false) {
        cout << "congrats you have upgraded to level 2" << endl;
        this->level2();
    }
    else {
        cout << "GAME OVER" << endl;
    }

}


void AdventureIsland::level2() {
    cout <<" LEVEL 2 " << endl;

    //create (restore) squadmember:
    int size = this->numSquadMembers;
    SquadMember * SM[size];
    string players[size];

    //create names for the players
    for(int i = 0; i < size; i++ ) {
        players[i] = "Player-" + to_string(i);
    }
    //populate SM array:
    SM[0] = new SquadMember(6, 2, players[0]);                
    for(int i = 1; i < size; i++ ) {
        SM[i] = SM[0]->clone(players[i]);
    }



    //create enemy:
    EnemyFactory * level2 = new GorillaFactory();
    Enemy * level2_Gorilla = level2->createEnemy("punch" , "hide");

    //attack:
    for(int i = 0; i < this->numSquadMembers ; i++) {
        if(level2_Gorilla->isAlive() == true) {
            level2_Gorilla->attack(*SM[i]);
        }
    }

    if(level2_Gorilla->isAlive() == false) {
        this->level3();
    }
    else {
        cout << "GAME OVER" << endl;
    }
}


void AdventureIsland::level3() {
    cout <<" LEVEL 3 " << endl;

    //create squadmember:
    int size = this->numSquadMembers;
    SquadMember * SM[size];
    string players[size];

    //create names for the players
    for(int i = 0; i < size; i++ ) {
        players[i] = "Player-" + to_string(i);
    }
    //populate SM array:
    SM[0] = new SquadMember(6, 2, players[0]);                
    for(int i = 1; i < size; i++ ) {
        SM[i] = SM[0]->clone(players[i]);
    }



    //create enemy:
    EnemyFactory * level3 = new JaguarFactory();
    Enemy * level3_Jaguar = level3->createEnemy("jump" , "climb a tree");

    //attack:
    for(int i = 0; i < this->numSquadMembers ; i++) {
        if(level3_Jaguar->isAlive() == true) {
            level3_Jaguar->attack(*SM[i]);
        }
    }

  
    if(level3_Jaguar->isAlive() == false) {
        this->level4();
    }
    else {
        cout << "GAME OVER" << endl;
    }
}

void AdventureIsland::level4() {
    cout <<" LEVEL 4 " << endl;

    //create squadmember:
    int size = this->numSquadMembers;
    SquadMember * SM[size];
    string players[size];

    //create names for the players
    for(int i = 0; i < size; i++ ) {
        players[i] = "Player-" + to_string(i);
    }
    //populate SM array:
    SM[0] = new SquadMember(6, 2, players[0]);                
    for(int i = 1; i < size; i++ ) {
        SM[i] = SM[0]->clone(players[i]);
    }



    //create enemy:
    EnemyFactory * level4 = new JaguarFactory();
    Enemy * level4_Cannibal = level4->createEnemy("bite" , "run away");

    //attack:
    for(int i = 0; i < this->numSquadMembers ; i++) {
        if(level4_Cannibal->isAlive() == true) {
            level4_Cannibal->attack(*SM[i]);
        }
    }

  
    if(level4_Cannibal->isAlive() == false) {
        cout << "YOU WON!" << endl;
    }
    else {
        cout << "GAME OVER" << endl;
    }
}




