// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_util_SortedSet__
#define __java_util_SortedSet__

#pragma interface

#include <java/lang/Object.h>

class java::util::SortedSet : public ::java::lang::Object
{
public:
  virtual ::java::util::Comparator *comparator () = 0;
  virtual ::java::lang::Object *first () = 0;
  virtual ::java::util::SortedSet *headSet (::java::lang::Object *) = 0;
  virtual ::java::lang::Object *last () = 0;
  virtual ::java::util::SortedSet *subSet (::java::lang::Object *, ::java::lang::Object *) = 0;
  virtual ::java::util::SortedSet *tailSet (::java::lang::Object *) = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_util_SortedSet__ */