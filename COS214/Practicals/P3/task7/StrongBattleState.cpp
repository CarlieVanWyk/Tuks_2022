#include "StrongBattleState.h"

StrongBattleState::StrongBattleState() {
    battleStyle = "strong";
}

int StrongBattleState::handle(string nameOfPokemon, int damage) {
    cout << nameOfPokemon << " has selected a strong battle state, and will inflict " 
    << damage << " points on the next ballte attack but misses the following attack turn." << endl;

    return (damage * 2);
}