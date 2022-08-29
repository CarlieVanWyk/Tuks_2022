#include "ChocLeaf.h"

ChocLeaf::ChocLeaf(string manu, string type, double price, int bpcc, bool slab) {
    chocManu = manu;
    chocType = type;
    chocPrice = price;
    chocBPCC = bpcc;
    chocSlab = slab;

    //create chocolate:
    if(chocManu == "Cadbury") {
        cad = new Cadbury();
        if(chocType == "solid") {
            choc = cad->createChoc(chocSlab);
        } else {
            choc = cad->createAerChoc(chocBPCC);
        }
    } else if(chocManu == "Lindt") {
        cad = new Lindt();
        if(chocType == "solid") {
            choc = cad->createChoc(chocSlab);
        } else {
            choc = cad->createAerChoc(chocBPCC);
        }
    } else if(chocManu == "Nestle") {
        cad = new Nestle();
        if(chocType == "solid") {
            choc = cad->createChoc(chocSlab);
        } else {
            choc = cad->createAerChoc(chocBPCC);
        }
    }

}

ChocLeaf::~ChocLeaf() {
    delete choc;
    delete cad;
}

string ChocLeaf::getChocManu() {
    return chocManu;
}

string ChocLeaf::getChocType() {
    return chocType;
}

double ChocLeaf::getChocPrice() {
    return chocPrice;
}

int ChocLeaf::getChocBPCC() {
    return chocBPCC;
}

bool ChocLeaf::getChocSlab() {
    return chocSlab;
}

void ChocLeaf::displayInfo() {
    cout << "Leaf chocolate info) "
    << choc->getDescription() << endl;
}