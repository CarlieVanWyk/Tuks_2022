#include <iostream>
#include "Cannibal.h"

Cannibal::Cannibal(int HP, string attackMove, int damage, string defenseMove, string priWeapon) :
    Enemy(HP, attackMove, damage, defenseMove){
        this->primaryWeapon = priWeapon;
}
        
bool Cannibal::hitSquadMember(SquadMember * z){
    cout << "Cannibal rushes towards " << z->getName() << " with a " << this->primaryWeapon << endl;

    int checkHP =  z->takeDamage(this->damage);
    if(checkHP <= 0) {
        z->setAlive(false);
        return true;
    }
    else {
        return false;
    }
    
}
        
        
void Cannibal::celebrate(){
    cout << "Shakes his " << this->defenseMove << " at the player's remains." << endl;
}
        
        
bool Cannibal::getHit(SquadMember * z){
    
    if(z->getAlive() == true) {
        cout << "The other villagers come running deploying " << this->defenseMove << endl;
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
        
void Cannibal::die(){
    cout << "Screams with his last breath, “I am your father'" << endl;
}