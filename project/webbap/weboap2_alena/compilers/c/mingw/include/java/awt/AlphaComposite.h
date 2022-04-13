// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_AlphaComposite__
#define __java_awt_AlphaComposite__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class CompositeContext;
      class RenderingHints;
      namespace image
      {
        class ColorModel;
      }
      class AlphaComposite;
    }
  }
}

class java::awt::AlphaComposite : public ::java::lang::Object
{
private:
  AlphaComposite (jint, jfloat);
public:
  static ::java::awt::AlphaComposite *getInstance (jint);
  static ::java::awt::AlphaComposite *getInstance (jint, jfloat);
  ::java::awt::CompositeContext *createContext (::java::awt::image::ColorModel *, ::java::awt::image::ColorModel *, ::java::awt::RenderingHints *);
  jfloat getAlpha () { return alpha; }
  jint getRule () { return rule; }
  jint hashCode ();
  jboolean equals (::java::lang::Object *);
private:
  static ::java::util::LinkedHashMap *cache;
public:
  static const jint CLEAR = 1L;
  static const jint SRC = 2L;
  static const jint DST = 9L;
  static const jint SRC_OVER = 3L;
  static const jint DST_OVER = 4L;
  static const jint SRC_IN = 5L;
  static const jint DST_IN = 6L;
  static const jint SRC_OUT = 7L;
  static const jint DST_OUT = 8L;
  static const jint SRC_ATOP = 10L;
  static const jint DST_ATOP = 11L;
  static const jint XOR = 12L;
  static ::java::awt::AlphaComposite *Clear;
  static ::java::awt::AlphaComposite *Src;
  static ::java::awt::AlphaComposite *Dst;
  static ::java::awt::AlphaComposite *SrcOver;
  static ::java::awt::AlphaComposite *DstOver;
  static ::java::awt::AlphaComposite *SrcIn;
  static ::java::awt::AlphaComposite *DstIn;
  static ::java::awt::AlphaComposite *SrcOut;
  static ::java::awt::AlphaComposite *DstOut;
  static ::java::awt::AlphaComposite *SrcAtop;
  static ::java::awt::AlphaComposite *DstAtop;
  static ::java::awt::AlphaComposite *Xor;
private:
  jint __attribute__((aligned(__alignof__( ::java::lang::Object ))))  rule;
  jfloat alpha;

  friend class java_awt_AlphaComposite$1;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_awt_AlphaComposite__ */
