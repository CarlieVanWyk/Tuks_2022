#include <iostream>
#include <string>
#include "Confectionary.h"
#include "AeratedChocolate.h"
#include "Aero.h"
#include "DiaryMilkBubbly.h"
#include "Chocolate.h"
#include "DiaryMilk.h"
#include "Lindor.h"
#include "MilkyBar.h"


using namespace std;

int main() {
    //_________________________________________chocolate:
    // string slabOrNot;

    // cout << "Will you have a slab(yes/no)? ";
    // getline(cin, slabOrNot);

    // bool theChoice;

    // if(slabOrNot == "yes") {
    //     theChoice = true;
    // } else {
    //     theChoice = false;
    // }

    // Chocolate *c1 = new DiaryMilk("Cadbury", 1.5, theChoice);
    // cout << c1->getDescription();
    // Chocolate *c2 = new MilkyBar("Cadbury2", 1.3, theChoice);
    // cout << c2->getDescription();
    // Confectionary *c3 = new DiaryMilk("Cadbury3", 2.0, theChoice);
    // cout << c3->getDescription();

    //______________________________________________aerated chocolate:
    string numBubbles;

    cout << "How many bubbles? ";
    getline(cin, numBubbles);

    int theBubbles = stoi(numBubbles);

    AeratedChocolate *a1 = new Aero("Nestle", 1.5, theBubbles);
    cout << a1->getDescription();
    AeratedChocolate *a2 = new DiaryMilkBubbly("Nestle2", 1.3, theBubbles);
    cout << a2->getDescription();
    Confectionary *a3 = new Aero("Nestle3", 2.0, theBubbles);
    cout << a3->getDescription();
}