#ifndef RUNPLAYSTYLE_H
#define RUNPLAYSTYLE_H

#include <iostream>
#include <string>
#include "PlayStyle.h"
using namespace std;

class RunPlayStyle : public PlayStyle
{
    public:
        string attack();
};

#endif