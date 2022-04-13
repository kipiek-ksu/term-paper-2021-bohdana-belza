// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_event_WindowAdapter__
#define __java_awt_event_WindowAdapter__

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
        class WindowAdapter;
        class WindowEvent;
      }
    }
  }
}

class java::awt::event::WindowAdapter : public ::java::lang::Object
{
public:
  WindowAdapter ();
  virtual void windowOpened (::java::awt::event::WindowEvent *) { }
  virtual void windowClosing (::java::awt::event::WindowEvent *) { }
  virtual void windowClosed (::java::awt::event::WindowEvent *) { }
  virtual void windowIconified (::java::awt::event::WindowEvent *) { }
  virtual void windowDeiconified (::java::awt::event::WindowEvent *) { }
  virtual void windowActivated (::java::awt::event::WindowEvent *) { }
  virtual void windowDeactivated (::java::awt::event::WindowEvent *) { }
  virtual void windowStateChanged (::java::awt::event::WindowEvent *) { }
  virtual void windowGainedFocus (::java::awt::event::WindowEvent *) { }
  virtual void windowLostFocus (::java::awt::event::WindowEvent *) { }

  static ::java::lang::Class class$;
};

#endif /* __java_awt_event_WindowAdapter__ */