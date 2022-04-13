// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_dnd_DragSourceAdapter__
#define __java_awt_dnd_DragSourceAdapter__

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
        class DragSourceAdapter;
        class DragSourceDropEvent;
        class DragSourceEvent;
        class DragSourceDragEvent;
      }
    }
  }
}

class java::awt::dnd::DragSourceAdapter : public ::java::lang::Object
{
public:
  DragSourceAdapter ();
  virtual void dragEnter (::java::awt::dnd::DragSourceDragEvent *) { }
  virtual void dragOver (::java::awt::dnd::DragSourceDragEvent *) { }
  virtual void dragMouseMoved (::java::awt::dnd::DragSourceDragEvent *) { }
  virtual void dropActionChanged (::java::awt::dnd::DragSourceDragEvent *) { }
  virtual void dragExit (::java::awt::dnd::DragSourceEvent *) { }
  virtual void dragDropEnd (::java::awt::dnd::DragSourceDropEvent *) { }

  static ::java::lang::Class class$;
};

#endif /* __java_awt_dnd_DragSourceAdapter__ */
