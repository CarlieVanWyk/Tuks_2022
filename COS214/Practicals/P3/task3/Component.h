#ifndef COMPONENT_H
#define COMPONENT_H

#include <string>
#include <iostream>
using namespace std;

class Component {
    public:
        virtual void add(Component* newComp);
        virtual void remove(Component* theComp);
        virtual Component* getComp(int index);

        virtual string getChocManu();
        virtual string getChocType();
        virtual double getChocPrice();
        virtual int getChocBPCC();
        virtual bool getChocSlab();
        
        virtual void displayInfo() = 0;
};

#endif