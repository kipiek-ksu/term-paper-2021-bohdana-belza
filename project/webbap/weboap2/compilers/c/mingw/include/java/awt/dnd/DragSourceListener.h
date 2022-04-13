// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_dnd_DragSourceListener__
#define __java_awt_dnd_DragSourceListener__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace dnd
      {
        class DragSourceListener;
        class DragSourceDropEvent;
        class DragSourceEvent;
        class DragSourceDragEvent;
      }
    }
  }
}

class java::awt::dnd::DragSourceListener : public ::java::lang::Object
{
public:
  virtual void dragEnter (::java::awt::dnd::DragSourceDragEvent *) = 0;
  virtual void dragOver (::java::awt::dnd::DragSourceDragEvent *) = 0;
  virtual void dropActionChanged (::java::awt::dnd::DragSourceDragEvent *) = 0;
  virtual void dragExit (::java::awt::dnd::DragSourceEvent *) = 0;
  virtual void dragDropEnd (::java::awt::dnd::DragSourceDropEvent *) = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_awt_dnd_DragSourceListener__ */