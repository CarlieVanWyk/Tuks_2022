#include <iostream>
#include "Pokemon.h"
#include "PlayStyle.h"
#include "AttackPlaySyle.h"
#include "PhysicalPlayStyle.h"
#include "RunPlayStyle.h"
#include "NormalBattleState.h"
#include "AgileBattleState.h"
#include "StrongBattleState.h"

using namespace std;

Pokemon* createPokemon() {
    Pokemon* p;
    string name;
    int HP;
    int damage;
    string ps;

    cout << "Enter name: ";
    cin >> name;
    cout << "Enter HP: ";
    cin >> HP;
    cout << "Enter damage: ";
    cin >> damage;
    cout << "Enter play style (attack, physical, run): ";
    cin >> ps;

    if (ps == "attack") {
        p = new Pokemon(name, HP, damage, new AttackPlayStyle());
    } else if (ps == "physical") {
        p = new Pokemon(name, HP, damage, new PhysicalPlayStyle());
    } else if (ps == "run") {
        p = new Pokemon(name, HP, damage, new RunPlayStyle());
    } else {
        cout << "Invalid play style" << endl;
    }

    return p;
}

int main() {
    Pokemon* p1 = createPokemon();
    Pokemon* p2 = createPokemon();
    bool p1turn = true;
    bool keepPlaying = true;

    while(keepPlaying) {
        //p1 select battle state
        p1->selectBattleState();
        //show p1 damage
        cout << p1->attack() << endl;
        //p2 take damage
        p2->takeDamage(p1->attack());

        //p2 select battle state
        p2->selectBattleState();
        //show p2 damage
        cout << p2->attack() << endl;
        //p1 take damage
        p1->takeDamage(p2->attack());

        //cout if you want to keep playing
        cout << "Do you want to keep playing? (y/n)" << endl;
        string choice;
        getline(cin, choice);
        if(choice == "y") {
            keepPlaying = true;
        }
        else {
            keepPlaying = false;
            break;
        }

    }

    //dealocate memery
    delete p1;
    delete p2;

    return 0;
}

