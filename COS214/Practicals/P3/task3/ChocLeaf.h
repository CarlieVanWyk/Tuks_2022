#ifndef CHOCLEAF_H
#define CHOCLEAF_H

#include <string>
#include <iostream>
#include "Component.h"
#include "Confectionary.h"
#include "ConfectionaryFactory.h"
#include "Cadbury.h"
#include "Lindt.h"
#include "Nestle.h"
using namespace std;

class ChocLeaf : public Component {
    private:
        string chocManu;
        string chocType;
        double chocPrice;
        int chocBPCC;
        bool chocSlab;
        Confectionary* choc;
        ConfectionaryFactory* cad;

    public:
        ChocLeaf(string, string, double, int, bool);
        ~ChocLeaf();

        string getChocManu();
        string getChocType();
        double getChocPrice();
        int getChocBPCC();
        bool getChocSlab();

        void displayInfo();
};

#endif