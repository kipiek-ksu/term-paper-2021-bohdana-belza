// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_beans_PropertyChangeListenerProxy__
#define __java_beans_PropertyChangeListenerProxy__

#pragma interface

#include <java/util/EventListenerProxy.h>

extern "Java"
{
  namespace java
  {
    namespace beans
    {
      class PropertyChangeListenerProxy;
      class PropertyChangeEvent;
      class PropertyChangeListener;
    }
  }
}

class java::beans::PropertyChangeListenerProxy : public ::java::util::EventListenerProxy
{
public:
  PropertyChangeListenerProxy (::java::lang::String *, ::java::beans::PropertyChangeListener *);
  virtual void propertyChange (::java::beans::PropertyChangeEvent *);
  virtual ::java::lang::String *getPropertyName () { return propertyName; }
public: // actually package-private
  ::java::lang::String * __attribute__((aligned(__alignof__( ::java::util::EventListenerProxy )))) propertyName;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_beans_PropertyChangeListenerProxy__ */
