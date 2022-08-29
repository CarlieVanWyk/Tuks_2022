#include "Pokemon.h"

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