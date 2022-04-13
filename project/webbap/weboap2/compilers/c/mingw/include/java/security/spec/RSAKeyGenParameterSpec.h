// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_security_spec_RSAKeyGenParameterSpec__
#define __java_security_spec_RSAKeyGenParameterSpec__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace security
    {
      namespace spec
      {
        class RSAKeyGenParameterSpec;
      }
    }
    namespace math
    {
      class BigInteger;
    }
  }
}

class java::security::spec::RSAKeyGenParameterSpec : public ::java::lang::Object
{
public:
  RSAKeyGenParameterSpec (jint, ::java::math::BigInteger *);
  virtual jint getKeysize () { return keysize; }
  virtual ::java::math::BigInteger *getPublicExponent () { return publicExponent; }
private:
  jint __attribute__((aligned(__alignof__( ::java::lang::Object ))))  keysize;
  ::java::math::BigInteger *publicExponent;
public:
  static ::java::math::BigInteger *F0;
  static ::java::math::BigInteger *F4;

  static ::java::lang::Class class$;
};

#endif /* __java_security_spec_RSAKeyGenParameterSpec__ */
