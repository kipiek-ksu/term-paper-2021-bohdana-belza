// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_image_renderable_RenderableImageProducer__
#define __java_awt_image_renderable_RenderableImageProducer__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace image
      {
        class ImageConsumer;
        namespace renderable
        {
          class RenderableImageProducer;
          class RenderContext;
          class RenderableImage;
        }
      }
    }
  }
}

class java::awt::image::renderable::RenderableImageProducer : public ::java::lang::Object
{
public:
  RenderableImageProducer (::java::awt::image::renderable::RenderableImage *, ::java::awt::image::renderable::RenderContext *);
  virtual void setRenderContext (::java::awt::image::renderable::RenderContext *) { }
  virtual void addConsumer (::java::awt::image::ImageConsumer *) { }
  virtual jboolean isConsumer (::java::awt::image::ImageConsumer *);
  virtual void removeConsumer (::java::awt::image::ImageConsumer *) { }
  virtual void startProduction (::java::awt::image::ImageConsumer *) { }
  virtual void requestTopDownLeftRightResend (::java::awt::image::ImageConsumer *) { }
  virtual void run () { }

  static ::java::lang::Class class$;
};

#endif /* __java_awt_image_renderable_RenderableImageProducer__ */
