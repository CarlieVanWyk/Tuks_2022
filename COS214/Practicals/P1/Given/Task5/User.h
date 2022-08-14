#ifndef USER_H
#define USER_H

#include <iostream>
#include <string>
#include "Snapshot.h"

using namespace std;

class User {
  
 private:
  string _username;
  string _password;

  string GenerateRandomString(int length);

 public:
  User(string password, string username);
    
  void SetPassword(string password);

  AuditableSnapshot *Save();

  void Restore(AuditableSnapshot *memento);
};

#endif
