// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_swing_plaf_ListUI__
#define __javax_swing_plaf_ListUI__

#pragma interface

#include <javax/swing/plaf/ComponentUI.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      class Rectangle;
      class Point;
    }
  }
  namespace javax
  {
    namespace swing
    {
      namespace plaf
      {
        class ListUI;
      }
      class JList;
    }
  }
}

class javax::swing::plaf::ListUI : public ::javax::swing::plaf::ComponentUI
{
public:
  ListUI ();
  virtual jint locationToIndex (::javax::swing::JList *, ::java::awt::Point *) = 0;
  virtual ::java::awt::Point *indexToLocation (::javax::swing::JList *, jint) = 0;
  virtual ::java::awt::Rectangle *getCellBounds (::javax::swing::JList *, jint, jint) = 0;

  static ::java::lang::Class class$;
};

#endif /* __javax_swing_plaf_ListUI__ */
