// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_util_logging_ErrorManager__
#define __java_util_logging_ErrorManager__

#pragma interface

#include <java/lang/Object.h>

class java::util::logging::ErrorManager : public ::java::lang::Object
{
public:
  ErrorManager ();
  virtual void error (::java::lang::String *, ::java::lang::Exception *, jint);
  static const jint GENERIC_FAILURE = 0L;
  static const jint WRITE_FAILURE = 1L;
  static const jint FLUSH_FAILURE = 2L;
  static const jint CLOSE_FAILURE = 3L;
  static const jint OPEN_FAILURE = 4L;
  static const jint FORMAT_FAILURE = 5L;
private:
  jboolean __attribute__((aligned(__alignof__( ::java::lang::Object ))))  everUsed;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_util_logging_ErrorManager__ */