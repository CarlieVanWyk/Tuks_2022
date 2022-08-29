#include "AgileBattleState.h"

AgileBattleState::AgileBattleState() {
    battleStyle = "agile";
}

int AgileBattleState::handle(string nameOfPokemon, int damage) {
    cout << nameOfPokemon << " has selected an agile battle state, and is alloweed tow battle atatcks in one turn and will deal " 
    << damage << " points." << endl;

    return (damage * (3 / 4));
}