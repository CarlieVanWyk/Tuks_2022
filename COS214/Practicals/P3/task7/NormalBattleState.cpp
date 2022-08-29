#include "NormalBattleState.h"

NormalBattleState::NormalBattleState() {
    battleStyle = "normal";
}

int NormalBattleState::handle(string nameOfPokemon, int damage) {
    cout << nameOfPokemon << " has no special battle state, normal battle attack will deal " 
    << damage << " points." << endl;

    return damage;
}