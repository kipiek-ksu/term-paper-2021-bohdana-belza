// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_event_FocusAdapter__
#define __java_awt_event_FocusAdapter__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace event
      {
        class FocusAdapter;
        class FocusEvent;
      }
    }
  }
}

class java::awt::event::FocusAdapter : public ::java::lang::Object
{
public:
  FocusAdapter ();
  virtual void focusGained (::java::awt::event::FocusEvent *) { }
  virtual void focusLost (::java::awt::event::FocusEvent *) { }

  static ::java::lang::Class class$;
};

#endif /* __java_awt_event_FocusAdapter__ */
