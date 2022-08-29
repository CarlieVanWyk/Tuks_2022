#include "ChocGroup.h"

ChocGroup::ChocGroup(string name) {
    this->name = name;
}

ChocGroup::~ChocGroup() {
    for(int i = 0; i < chocComponents.size(); i++) {
        delete chocComponents[i];
    }
}

void ChocGroup::add(Component* newComp) {
    chocComponents.push_back(newComp);
}

void ChocGroup::remove(Component* theComp) {
    for(int i = 0; i < chocComponents.size(); i++) {
        if(chocComponents[i] == theComp) {
            chocComponents.erase(chocComponents.begin() + i);
        }
    }
}

Component* ChocGroup::getComp(int index) {
    return chocComponents[index];
}

string ChocGroup::getGroupName() {
    return name;
}

void ChocGroup::displayInfo() {
    cout << "ChocGroup: " << getGroupName() << endl;
    for(int i = 0; i < chocComponents.size(); i++) {
        chocComponents[i]->displayInfo();
    }
}

// #include "ChocLeaf.h"


