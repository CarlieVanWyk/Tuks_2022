#include <iostream>
#include <string>
#include "Snapshot.h"
#include "User.h"
#include "AuditableSnapshot.h"
using namespace std;

    Snapshot::Snapshot(string password, string username){
        this->password = password;
        this->username = username;
    }

    string Snapshot::state()
    {
        return this->password;
    }

    string Snapshot::GetUsername()
    {
        return this->username;
        
    }
  