#ifndef AUDITABLESNAPSHOT_H
#define AUDITABLESNAPSHOT_H

#include <iostream>
#include <string>

using namespace std;

class AuditableSnapshot {
 public:
  virtual string GetUsername() = 0;
  virtual string state() = 0;
};

#endif