#ifndef USERMANAGER_H
#define USERMANAGER_H

#include <iostream>
#include <string>
#include <vector>
#include "User.h"
#include "AuditableSnapshot.h"

using namespace std;

class UserManager {

  private:
    vector<AuditableSnapshot *> mementos_;
    User *user_;

 public:
  UserManager(User *User);

  void Backup() ;

  void Undo();

  void ShowHistory() const ;
};
#endif