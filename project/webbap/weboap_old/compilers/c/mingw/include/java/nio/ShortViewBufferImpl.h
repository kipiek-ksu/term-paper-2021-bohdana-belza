// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_nio_ShortViewBufferImpl__
#define __java_nio_ShortViewBufferImpl__

#pragma interface

#include <java/nio/ShortBuffer.h>

extern "Java"
{
  namespace java
  {
    namespace nio
    {
      class ShortViewBufferImpl;
      class ShortBuffer;
      class ByteOrder;
      class ByteBuffer;
    }
  }
}

class java::nio::ShortViewBufferImpl : public ::java::nio::ShortBuffer
{
public:
  ShortViewBufferImpl (::java::nio::ByteBuffer *, jint, jint, jint, jint, jint, jboolean, ::java::nio::ByteOrder *);
  virtual jshort get ();
  virtual jshort get (jint);
  virtual ::java::nio::ShortBuffer *put (jshort);
  virtual ::java::nio::ShortBuffer *put (jint, jshort);
  virtual ::java::nio::ShortBuffer *compact ();
  virtual ::java::nio::ShortBuffer *slice ();
public: // actually package-private
  virtual ::java::nio::ShortBuffer *duplicate (jboolean);
public:
  virtual ::java::nio::ShortBuffer *duplicate ();
  virtual ::java::nio::ShortBuffer *asReadOnlyBuffer ();
  virtual jboolean isReadOnly () { return readOnly; }
  virtual jboolean isDirect ();
  virtual ::java::nio::ByteOrder *order () { return endian; }
private:
  jint __attribute__((aligned(__alignof__( ::java::nio::ShortBuffer ))))  offset;
  ::java::nio::ByteBuffer *bb;
  jboolean readOnly;
  ::java::nio::ByteOrder *endian;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_nio_ShortViewBufferImpl__ */