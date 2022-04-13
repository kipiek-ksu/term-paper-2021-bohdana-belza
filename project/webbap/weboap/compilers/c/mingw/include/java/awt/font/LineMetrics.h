// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_font_LineMetrics__
#define __java_awt_font_LineMetrics__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace font
      {
        class LineMetrics;
      }
    }
  }
}

class java::awt::font::LineMetrics : public ::java::lang::Object
{
public:
  virtual jfloat getAscent () = 0;
  virtual jint getBaselineIndex () = 0;
  virtual jfloatArray getBaselineOffsets () = 0;
  virtual jfloat getDescent () = 0;
  virtual jfloat getHeight () = 0;
  virtual jfloat getLeading () = 0;
  virtual jint getNumChars () = 0;
  virtual jfloat getStrikethroughOffset () = 0;
  virtual jfloat getStrikethroughThickness () = 0;
  virtual jfloat getUnderlineOffset () = 0;
  virtual jfloat getUnderlineThickness () = 0;
  LineMetrics ();

  static ::java::lang::Class class$;
};

#endif /* __java_awt_font_LineMetrics__ */
