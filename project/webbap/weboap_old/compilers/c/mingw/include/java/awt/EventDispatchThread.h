// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_EventDispatchThread__
#define __java_awt_EventDispatchThread__

#pragma interface

#include <java/lang/Thread.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class EventDispatchThread;
      class EventQueue;
    }
  }
}

class java::awt::EventDispatchThread : public ::java::lang::Thread
{
public: // actually package-private
  EventDispatchThread (::java::awt::EventQueue *);
public:
  virtual void run ();
private:
  static jint dispatchThreadNum;
  ::java::awt::EventQueue * __attribute__((aligned(__alignof__( ::java::lang::Thread )))) queue;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_awt_EventDispatchThread__ */