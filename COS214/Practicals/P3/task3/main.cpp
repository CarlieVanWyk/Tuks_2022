#include <iostream>
#include <string>
// #include "Confectionary.h"
// #include "ConfectionaryFactory.h"
// #include "Cadbury.h"
// #include "Lindt.h"
// #include "Nestle.h"
#include "Component.h"
#include "ChocLeaf.h"
#include "ChocGroup.h"


using namespace std;

int main() {
    bool goOn = true;
    Component *basket = new ChocGroup("basket");
    while(goOn) {
        string choice;
        cout << "Leaf or Group? (l/g): ";
        getline(cin, choice);
        if(choice == "l") {
            //get manufacturer:
            string manufacturer;
            cout << "Enter manufacturer: ";
            getline(cin, manufacturer);

            //get type of chocolate:
            string type;
            cout << "Enter type of chocolate (solid or aerated): ";
            getline(cin, type);

            //_______get oter variable (slab boolean/bubbles per cc int):
            //slab
            string slabOrNot;
            cout << "Will you have a slab(yes/no)? ";
            getline(cin, slabOrNot);
            bool theChoice;
            if(slabOrNot == "yes") {
                theChoice = true;
            } else {
                theChoice = false;
            }

            //bpcc
            string numBubbles;
            cout << "How many bubbles? ";
            getline(cin, numBubbles);
            int theBubbles = stoi(numBubbles);

            Component *leaf = new ChocLeaf(manufacturer, type, 10.00, theBubbles, theChoice);
            basket->add(leaf);

            string more;
            cout << "Add more leafs to main basket? (y/n): ";
            getline(cin, more);
            if(more == "n") {
                goOn = false;
                break;
            }
        }
        else {
            //get name of group:
            string name;
            cout << "Enter name of group: ";
            getline(cin, name);
            Component *group = new ChocGroup(name);
            basket->add(group);
            
            bool goOn2 = true;
            while(goOn2) {
                //get manufacturer:
                string manufacturer;
                cout << "Enter manufacturer: ";
                getline(cin, manufacturer);

                //get type of chocolate:
                string type;
                cout << "Enter type of chocolate (solid or aerated): ";
                getline(cin, type);

                //_______get oter variable (slab boolean/bubbles per cc int):
                //slab
                string slabOrNot;
                cout << "Will you have a slab(yes/no)? ";
                getline(cin, slabOrNot);
                bool theChoice;
                if(slabOrNot == "yes") {
                    theChoice = true;
                } else {
                    theChoice = false;
                }

                //bpcc
                string numBubbles;
                cout << "How many bubbles? ";
                getline(cin, numBubbles);
                int theBubbles = stoi(numBubbles);

                Component *leaf2 = new ChocLeaf(manufacturer, type, 10.00, theBubbles, theChoice);
                group->add(leaf2);

                cout << "Add more to group: " << name << "? (y/n): ";
                string more;  
                getline(cin, more);
                if(more == "n") {
                    goOn = false;
                    break;
                }
            }
            cout << "Add more groups? (y/n): ";
            string more;
            getline(cin, more);
                if(more == "n") {
                    goOn = false;
                    break;
                }
        }
    }

    basket->displayInfo();

    //deaolocate memory
    delete basket;


    // //get manufacturer:
    // string manufacturer;
    // cout << "Enter manufacturer: ";
    // getline(cin, manufacturer);

    // //get type of chocolate:
    // string type;
    // cout << "Enter type of chocolate (solid or aerated): ";
    // getline(cin, type);

    // //_______get oter variable (slab boolean/bubbles per cc int):
    // //slab
    // string slabOrNot;
    // cout << "Will you have a slab(yes/no)? ";
    // getline(cin, slabOrNot);
    // bool theChoice;
    // if(slabOrNot == "yes") {
    //     theChoice = true;
    // } else {
    //     theChoice = false;
    // }

    // //bpcc
    // string numBubbles;
    // cout << "How many bubbles? ";
    // getline(cin, numBubbles);
    // int theBubbles = stoi(numBubbles);


    // //____________________________custom made basket:
    // Component *basket = new ChocGroup("basket");
    // Component *group1 = new ChocGroup("part1");
    // Component *single1 = new ChocLeaf(manufacturer, type, 10.00, theBubbles, theChoice);

    // basket->add(group1);
    // basket->add(single1);

    // group1->add(new ChocLeaf(manufacturer, type, 20.00, theBubbles, theChoice));
    
    // basket->displayInfo();
    
    // //deallocate memory
    // delete basket;
    // delete group1;
    // delete single1;

    return 0;
}