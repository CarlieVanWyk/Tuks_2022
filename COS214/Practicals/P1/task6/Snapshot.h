#ifndef SNAPSHOT_H
#define SNAPSHOT_H
#include "AuditableSnapshot.h"
#include <iostream>
#include "string"

using namespace std;

class Snapshot : public AuditableSnapshot {
 private:
    string username;
    string password;
 
 public:
    Snapshot(string password, string username);

    string state();

    string GetUsername();

    string date();
  
};

#endif