#include <iostream>
#include "Enemy.h"

Enemy::Enemy(int HP, string attackMove, int damage, string defenseMove) {
    this->HP = HP;
    this->attackMove = attackMove;
    this->damage = damage;
    this->defenseMove = defenseMove; 
}

void Enemy::attack(SquadMember s1) {
    while(s1.getHP() > 0 && s1.getAlive() == true) {
        if(this->hitSquadMember(&s1) == true) {
            this->celebrate();
        }
        else {
            if(this->getHit(&s1) == true) {
                this->die();
                break;
            }
        }
    }
}

bool Enemy::isAlive() {
    if(this->HP <= 0) {
        return false;
    }
    else {
        return true;
    }
}
