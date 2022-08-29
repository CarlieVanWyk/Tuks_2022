#include <iostream>
#include <string>
#include "Confectionary.h"
// #include "AeratedChocolate.h"
// #include "Aero.h"
// #include "DiaryMilkBubbly.h"
// #include "Chocolate.h"
// #include "DiaryMilk.h"
// #include "Lindor.h"
// #include "MilkyBar.h"
#include "ConfectionaryFactory.h"
#include "Cadbury.h"
#include "Lindt.h"
#include "Nestle.h"


using namespace std;

int main() {
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

    //get price
    // string price;
    // cout << "Enter price: ";
    // getline(cin, price);
    // double amount = stod(price);

    //custom made chocolate:
    Confectionary** chocs = new Confectionary*[1];
    if(manufacturer == "Cadbury") {
        ConfectionaryFactory* cad = new Cadbury();
        if(type == "solid") {
            chocs[0] = cad->createChoc(theChoice);
            cout << chocs[0]->getDescription();
        } else {
            chocs[0] = cad->createAerChoc(theBubbles);
            cout << chocs[0]->getDescription();
        }
    } else if(manufacturer == "Lindt") {
        ConfectionaryFactory* lin = new Lindt();
        if(type == "solid") {
            chocs[0] = lin->createChoc(theChoice);
            cout << chocs[0]->getDescription();
        } else {
            chocs[0] = lin->createAerChoc(theBubbles);
            if(chocs[0] == NULL) {
                //do nothing
            }
        }
    } else if(manufacturer == "Nestle") {
        ConfectionaryFactory* nest = new Nestle();
        if(type == "solid") {
            chocs[0] = nest->createChoc(theChoice);
            cout << chocs[0]->getDescription();
        } else {
            chocs[0] = nest->createAerChoc(theBubbles);
            cout << chocs[0]->getDescription();
        }
    }

    //deallocate memory
    delete chocs[0];
    delete[] chocs;




    // ___________________________test Cadbury___________________________
    // ConfectionaryFactory* c1 = new Cadbury();
    // Confectionary* result0 = c1->createChoc(theChoice);
    // Confectionary* result1 = c1->createAerChoc(theBubbles);
    // cout << result0->getDescription();
    // cout << result1->getDescription(); 
    
    
    // // deallocate memory
    // delete result0;
    // delete result1;
    // delete c1;

    // ___________________________test Lindt___________________________
    // ConfectionaryFactory* c2 = new Lindt();
    // Confectionary* result2 = c2->createChoc(theChoice);
    // cout << result2->getDescription();
    // Confectionary* result3 = c2->createAerChoc(theBubbles);
    // if(result3 != NULL) {
    //     cout << result3->getDescription();
    // }

    // //deallocate memory
    // delete result3;
    // delete result2;
    // delete c2;

    // ___________________________test Nestle___________________________
    // ConfectionaryFactory* c3 = new Nestle();
    // Confectionary* result4 = c3->createChoc(theChoice);
    // Confectionary* result5 = c3->createAerChoc(theBubbles);
    // cout << result4->getDescription();
    // cout << result5->getDescription(); 
    
    
    // // deallocate memory
    // delete result4;
    // delete result5;
    // delete c3;


    return 0;
}