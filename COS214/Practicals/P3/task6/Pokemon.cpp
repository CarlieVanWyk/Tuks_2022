#include "Pokemon.h"

Pokemon::Pokemon(string name, int HP, int damage, PlayStyle* ps)
{
    this->name = name;
    this->HP = HP;
    this->damage = damage;
    this->playStyle = ps;
    this->battleState = new NormalBattleState();
}

void Pokemon::selectBattleState() {
    cout << "Select a battle state: " << endl;
    cout << "1. Normal" << endl;
    cout << "2. Agile" << endl;
    cout << "3. Strong" << endl;
    int choice;
    cin >> choice;

    switch (choice) {
        case 1:
            battleState = new NormalBattleState();
            break;
        case 2:
            battleState = new AgileBattleState();
            break;
        case 3:
            battleState = new StrongBattleState();
            break;
        default:
            cout << "Invalid choice." << endl;
            break;
    }

    if(battleState != NULL) {
        this->damage = battleState->handle(this->name, this->damage);
    }
}

int Pokemon::attack() {
    int result = battleState->handle(this->name, this->damage);

    if(this->HP > 0) {
        cout << this->name << playStyle->attack() << endl;
    }
    else {
        cout << this->name << " has fainted." << endl;
    }

    return result;
}

void Pokemon::setPlayStyle(PlayStyle* ps) {
    this->playStyle = ps;
}

void Pokemon::takeDamage(int damage) {
    this->HP -= damage;
}