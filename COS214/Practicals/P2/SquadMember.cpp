#include <iostream>
#include "SquadMember.h"

SquadMember::SquadMember() {

}

SquadMember::SquadMember(int HP, int damage, string name){
    this->HP = HP;
    this->damage = damage;
    this->name= name;

    if(this->HP > 0) {
        this->isAlive = true;
    }
    else {
        this->isAlive = false;
    }
}

void SquadMember::setHP(int val){
    this->HP = val;
}
void SquadMember::setDamage(int val) {             
    this->damage = val;
}
void SquadMember::setAlive(bool val) {
    this->isAlive = val;
}
int SquadMember::getHP(){
    return this->HP;
}
int SquadMember::getDamage() {
    return this->damage;
}
bool SquadMember::getAlive() {
    return this->isAlive;
}
string SquadMember::getName() {
    return this->name;
}

int SquadMember::takeDamage(int damageDone) {
    this->HP = this->HP - damageDone;

    return this->HP;
}

SquadMember* SquadMember::clone(string newName) {

    SquadMember * s = new SquadMember(this->HP, this->damage, newName);

    return s;
}

SquadMember::~SquadMember() {           
    
}