// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_io_ObjectOutput__
#define __java_io_ObjectOutput__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

class java::io::ObjectOutput : public ::java::lang::Object
{
public:
  virtual void write (jint) = 0;
  virtual void write (jbyteArray) = 0;
  virtual void write (jbyteArray, jint, jint) = 0;
  virtual void writeObject (::java::lang::Object *) = 0;
  virtual void flush () = 0;
  virtual void close () = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_io_ObjectOutput__ */
