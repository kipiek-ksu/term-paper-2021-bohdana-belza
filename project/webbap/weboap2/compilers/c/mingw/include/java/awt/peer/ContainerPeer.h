// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_peer_ContainerPeer__
#define __java_awt_peer_ContainerPeer__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace peer
      {
        class ContainerPeer;
      }
      class Insets;
    }
  }
}

class java::awt::peer::ContainerPeer : public ::java::lang::Object
{
public:
  virtual ::java::awt::Insets *insets () = 0;
  virtual ::java::awt::Insets *getInsets () = 0;
  virtual void beginValidate () = 0;
  virtual void endValidate () = 0;
  virtual void beginLayout () = 0;
  virtual void endLayout () = 0;
  virtual jboolean isPaintPending () = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_awt_peer_ContainerPeer__ */
