// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_java_util_prefs_MemoryBasedFactory__
#define __gnu_java_util_prefs_MemoryBasedFactory__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace gnu
  {
    namespace java
    {
      namespace util
      {
        namespace prefs
        {
          class MemoryBasedFactory;
        }
      }
    }
  }
}

class gnu::java::util::prefs::MemoryBasedFactory : public ::java::lang::Object
{
public:
  virtual ::java::util::prefs::Preferences *systemRoot ();
  virtual ::java::util::prefs::Preferences *userRoot ();
  MemoryBasedFactory ();
private:
  static ::java::util::prefs::Preferences *systemPreferences;
  static ::java::util::prefs::Preferences *userPreferences;
public:

  static ::java::lang::Class class$;
};

#endif /* __gnu_java_util_prefs_MemoryBasedFactory__ */