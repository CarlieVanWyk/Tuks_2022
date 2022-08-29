#ifndef CHOCGROUP_H
#define CHOCGROUP_H

#include <string>
#include <iostream>
#include <vector>
#include "Component.h"
using namespace std;

class ChocGroup : public Component {
    private:
        vector<Component*> chocComponents;
        string name;

    public:
        ChocGroup(string);
        ~ChocGroup();

        void add(Component* newComp);
        void remove(Component* theComp);
        Component* getComp(int index);
        string getGroupName();

        void displayInfo();
};

#endif