// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_event_ComponentListener__
#define __java_awt_event_ComponentListener__

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
        class ComponentListener;
        class ComponentEvent;
      }
    }
  }
}

class java::awt::event::ComponentListener : public ::java::lang::Object
{
public:
  virtual void componentResized (::java::awt::event::ComponentEvent *) = 0;
  virtual void componentMoved (::java::awt::event::ComponentEvent *) = 0;
  virtual void componentShown (::java::awt::event::ComponentEvent *) = 0;
  virtual void componentHidden (::java::awt::event::ComponentEvent *) = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_awt_event_ComponentListener__ */