// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_KeyEventPostProcessor__
#define __java_awt_KeyEventPostProcessor__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class KeyEventPostProcessor;
      namespace event
      {
        class KeyEvent;
      }
    }
  }
}

class java::awt::KeyEventPostProcessor : public ::java::lang::Object
{
public:
  virtual jboolean postProcessKeyEvent (::java::awt::event::KeyEvent *) = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_awt_KeyEventPostProcessor__ */