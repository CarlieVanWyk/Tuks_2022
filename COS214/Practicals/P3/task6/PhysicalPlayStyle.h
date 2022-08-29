#ifndef PHYSICALPLAYSTYLE_H
#define PHYSICALPLAYSTYLE_H

#include <iostream>
#include <string>
#include "PlayStyle.h"
using namespace std;

class PhysicalPlayStyle : public PlayStyle
{
    public:
        string attack();
};

#endif