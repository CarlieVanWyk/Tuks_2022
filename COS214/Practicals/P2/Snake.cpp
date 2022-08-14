#include <iostream>
#include "Snake.h"

Snake::Snake(int HP, string attackMove, int damage, string defenseMove, string priWeapon) :
    Enemy(HP, attackMove, damage, defenseMove){
        this->primaryWeapon = priWeapon;
}
         
bool Snake::hitSquadMember(SquadMember * z){
    cout << "Snake wraps around " << z->getName() << " and uses " << this->primaryWeapon << endl;

    int checkHP =  z->takeDamage(this->damage);
    if(checkHP <= 0) {
        z->setAlive(false);
        return true;
    }
    else {
        return false;
    }
    
}
        
        
void Snake::celebrate(){
    cout << "Player tried strongly till the end" << endl;
}
        
        
bool Snake::getHit(SquadMember * z){
    
    if(z->getAlive() == true) {
        cout << "Slithers rapidly searching for safety and employs " << this->defenseMove << endl;
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
        
void Snake::die(){
    cout << "Hisses and curls up as he is defeated" << endl;
}