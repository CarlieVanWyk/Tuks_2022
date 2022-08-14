#include "UserManager.h"
#include <iostream>
#include <string>
#include "Snapshot.h"
#include "User.h"

using namespace std;
 
UserManager::UserManager(User *user) : user_(user)
{
  // TODO : Implement
  this->user_ = user;
}

void UserManager::Backup() {
    cout << "\nUserManager: Saving User's state...\n";
    // TODO : Implement
    this->mementos_.push_back(this->user_->Save());
  }

  void UserManager::Undo() {
    // TODO : Implement
    mementos_.pop_back();
  }

  void UserManager::ShowHistory() const {
    cout << "UserManager: Here's the list of historal changes:\n";
    // TODO : Implement
    for (int i = 0; i < mementos_.size(); i++)
  {
    cout << (static_cast<Snapshot *>(mementos_[i]))->state() << endl;
  }
  }