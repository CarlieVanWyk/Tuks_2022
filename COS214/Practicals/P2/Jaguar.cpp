#include <iostream>
#include "Jaguar.h"

Jaguar::Jaguar(int HP, string attackMove, int damage, string defenseMove, string priWeapon) :
    Enemy(HP, attackMove, damage, defenseMove){
        this->primaryWeapon = priWeapon;
}
        
bool Jaguar::hitSquadMember(SquadMember * z){
    cout << "Jaguar leaps towards " << z->getName() << " and delivers a forceful " << this->primaryWeapon << endl;

    int checkHP =  z->takeDamage(this->damage);
    if(checkHP <= 0) {
        z->setAlive(false);
        return true;
    }
    else {
        return false;
    }
    
}
        
        
void Jaguar::celebrate(){
    cout << "Player tried strongly till the end" << endl;
}
        
        
bool Jaguar::getHit(SquadMember * z){
    
    if(z->getAlive() == true) {
        cout << "Growls in pain as he is maimed. Jaguar turns around and delivers " << this->defenseMove 
        << " against " << z->getName() << endl;
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
        
void Jaguar::die(){
    cout << "Gives one last growl before falling over" << endl;
}