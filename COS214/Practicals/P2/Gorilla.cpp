#include <iostream>
#include "Gorilla.h"

Gorilla::Gorilla(int HP, string attackMove, int damage, string defenseMove, string priWeapon) :
    Enemy(HP, attackMove, damage, defenseMove){
        this->primaryWeapon = priWeapon;
}
        
bool Gorilla::hitSquadMember(SquadMember * z){
    cout << "Gorilla slams his fists on the ground, growls and hits " << z->getName() << " with " << this->primaryWeapon << endl;

    int checkHP =  z->takeDamage(this->damage);
    if(checkHP <= 0) {
        z->setAlive(false);
        return true;
    }
    else {
        return false;
    }
    
}
        
        
void Gorilla::celebrate(){
    cout << "Player tried in vain trying to save himself." << endl;
}
        
        
bool Gorilla::getHit(SquadMember * z){
    
    if(z->getAlive() == true) {
        cout << "Roars and hits his chest in anger. " << endl;
        this->HP = this->HP - z->getDamage();

        if(this->HP <= 0) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }


}
        
void Gorilla::die(){
    cout << "The earth shakes as the gorilla falls to the ground. " << endl;
}