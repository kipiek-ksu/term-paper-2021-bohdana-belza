// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_text_Annotation__
#define __java_text_Annotation__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace text
    {
      class Annotation;
    }
  }
}

class java::text::Annotation : public ::java::lang::Object
{
public:
  Annotation (::java::lang::Object *);
  virtual ::java::lang::Object *getValue () { return attrib; }
  virtual ::java::lang::String *toString ();
private:
  ::java::lang::Object * __attribute__((aligned(__alignof__( ::java::lang::Object )))) attrib;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_text_Annotation__ */
