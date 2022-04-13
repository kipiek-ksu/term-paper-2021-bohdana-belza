// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_DisplayMode__
#define __java_awt_DisplayMode__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class DisplayMode;
    }
  }
}

class java::awt::DisplayMode : public ::java::lang::Object
{
public:
  DisplayMode (jint, jint, jint, jint);
  jint getHeight () { return height; }
  jint getWidth () { return width; }
  jint getBitDepth () { return bitDepth; }
  jint getRefreshRate () { return refreshRate; }
  jboolean equals (::java::awt::DisplayMode *);
  jint hashCode ();
  static const jint BIT_DEPTH_MULTI = -1L;
  static const jint REFRESH_RATE_UNKNOWN = 0L;
private:
  jint __attribute__((aligned(__alignof__( ::java::lang::Object ))))  width;
  jint height;
  jint bitDepth;
  jint refreshRate;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_awt_DisplayMode__ */
