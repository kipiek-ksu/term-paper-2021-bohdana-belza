// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_java_nio_charset_UTF_16__
#define __gnu_java_nio_charset_UTF_16__

#pragma interface

#include <java/nio/charset/Charset.h>

extern "Java"
{
  namespace gnu
  {
    namespace java
    {
      namespace nio
      {
        namespace charset
        {
          class UTF_16;
        }
      }
    }
  }
  namespace java
  {
    namespace nio
    {
      namespace charset
      {
        class CharsetEncoder;
        class CharsetDecoder;
        class Charset;
      }
    }
  }
}

class gnu::java::nio::charset::UTF_16 : public ::java::nio::charset::Charset
{
public: // actually package-private
  UTF_16 ();
public:
  jboolean contains (::java::nio::charset::Charset *);
  ::java::nio::charset::CharsetDecoder *newDecoder ();
  ::java::nio::charset::CharsetEncoder *newEncoder ();

  static ::java::lang::Class class$;
};

#endif /* __gnu_java_nio_charset_UTF_16__ */
