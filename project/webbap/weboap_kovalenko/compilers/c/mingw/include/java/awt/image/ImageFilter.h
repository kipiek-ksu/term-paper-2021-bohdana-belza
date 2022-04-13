// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_image_ImageFilter__
#define __java_awt_image_ImageFilter__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace image
      {
        class ColorModel;
        class ImageFilter;
        class ImageProducer;
        class ImageConsumer;
      }
    }
  }
}

class java::awt::image::ImageFilter : public ::java::lang::Object
{
public:
  virtual void resendTopDownLeftRight (::java::awt::image::ImageProducer *);
  virtual ::java::lang::Object *clone ();
  virtual ::java::awt::image::ImageFilter *getFilterInstance (::java::awt::image::ImageConsumer *);
  virtual void setDimensions (jint, jint);
  virtual void setProperties (::java::util::Hashtable *);
  virtual void setColorModel (::java::awt::image::ColorModel *);
  virtual void setHints (jint);
  virtual void setPixels (jint, jint, jint, jint, ::java::awt::image::ColorModel *, jbyteArray, jint, jint);
  virtual void setPixels (jint, jint, jint, jint, ::java::awt::image::ColorModel *, jintArray, jint, jint);
  virtual void imageComplete (jint);
  ImageFilter ();
public:  // actually protected
  ::java::awt::image::ImageConsumer * __attribute__((aligned(__alignof__( ::java::lang::Object )))) consumer;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_awt_image_ImageFilter__ */
