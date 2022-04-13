// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_Image__
#define __java_awt_Image__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class Image;
      class Graphics;
      namespace image
      {
        class ImageProducer;
        class ImageObserver;
      }
    }
  }
}

class java::awt::Image : public ::java::lang::Object
{
public:
  Image ();
  virtual jint getWidth (::java::awt::image::ImageObserver *) = 0;
  virtual jint getHeight (::java::awt::image::ImageObserver *) = 0;
  virtual ::java::awt::image::ImageProducer *getSource () = 0;
  virtual ::java::awt::Graphics *getGraphics () = 0;
  virtual ::java::lang::Object *getProperty (::java::lang::String *, ::java::awt::image::ImageObserver *) = 0;
  virtual ::java::awt::Image *getScaledInstance (jint, jint, jint);
  virtual void flush () = 0;
  static ::java::lang::Object *UndefinedProperty;
  static const jint SCALE_DEFAULT = 1L;
  static const jint SCALE_FAST = 2L;
  static const jint SCALE_SMOOTH = 4L;
  static const jint SCALE_REPLICATE = 8L;
  static const jint SCALE_AREA_AVERAGING = 16L;

  static ::java::lang::Class class$;
};

#endif /* __java_awt_Image__ */
