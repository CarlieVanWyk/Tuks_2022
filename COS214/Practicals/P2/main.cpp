#include <iostream>
#include <string>
#include "AdventureIsland.h"

using namespace std;

int main() {
    //testing enemy : snake
    // Enemy * s1 = new Snake(100, "hiss", 2, "curl up", "strike");
    // SquadMember * sm1 = new SquadMember(10, 5, "TheOne");
    // s1->attack(*sm1);

    //testing enemy : jaguar
    // Enemy * j1 = new Jaguar(100, "jump", 4, "sprints", "teeth");
    // SquadMember * sm2 = new SquadMember(10, 5, "TheSecond");
    // j1->attack(*sm2);

    //testing enemy : Gorilla
    // Enemy * g1 = new Gorilla(100, "punch", 4, "hide", "fists");
    // SquadMember * sm3 = new SquadMember(10, 5, "TheThird");
    // g1->attack(*sm3);

    //testing enemy : Cannibal
    // Enemy * c1 = new Cannibal(100, "eat", 4, "smile", "teeth");
    // SquadMember * sm4 = new SquadMember(10, 5, "TheFourth");
    // c1->attack(*sm4);

    //testing squadmember clone :
    // SquadMember * sm5 = new SquadMember(10, 4, "Frikkie");
    // SquadMember * sm5_clone = sm5->clone("Boeta");
    // cout << sm5->getName() << endl;
    // cout << sm5_clone->getName()<< endl;

    //testing Snakefactory :                                                          ?????more testing required
    // EnemyFactory * sf1 = new SnakeFactory();
    // sf1->createEnemy("hiss", "curl up");

    //testing adventure island:
    string size;

    cout << "How many players are playing? ";
    getline(cin, size);

    int theSize = stoi(size);
    AdventureIsland * game1 = new AdventureIsland(theSize);

    game1->initializeGame();

    return 0;
}