#ifndef ATTACKPLAYSTYLE_H
#define ATTACKPLAYSTYLE_H

#include <iostream>
#include <string>
#include "PlayStyle.h"
using namespace std;

class AttackPlayStyle : public PlayStyle
{
    public:
        string attack();
};

#endif