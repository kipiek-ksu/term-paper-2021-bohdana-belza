// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_java_security_provider_DSASignature__
#define __gnu_java_security_provider_DSASignature__

#pragma interface

#include <java/security/SignatureSpi.h>
#include <gcj/array.h>

extern "Java"
{
  namespace gnu
  {
    namespace java
    {
      namespace security
      {
        namespace provider
        {
          class DSASignature;
        }
      }
    }
  }
  namespace java
  {
    namespace security
    {
      namespace spec
      {
        class AlgorithmParameterSpec;
      }
      class SecureRandom;
      class PrivateKey;
      class PublicKey;
      class MessageDigest;
      namespace interfaces
      {
        class DSAPrivateKey;
        class DSAPublicKey;
      }
    }
  }
}

class gnu::java::security::provider::DSASignature : public ::java::security::SignatureSpi
{
public:
  DSASignature ();
private:
  void init ();
public:
  virtual void engineInitVerify (::java::security::PublicKey *);
  virtual void engineInitSign (::java::security::PrivateKey *);
  virtual void engineInitSign (::java::security::PrivateKey *, ::java::security::SecureRandom *);
  virtual void engineUpdate (jbyte);
  virtual void engineUpdate (jbyteArray, jint, jint);
  virtual jbyteArray engineSign ();
  virtual jint engineSign (jbyteArray, jint, jint);
  virtual jboolean engineVerify (jbyteArray);
  virtual void engineSetParameter (::java::lang::String *, ::java::lang::Object *);
  virtual void engineSetParameter (::java::security::spec::AlgorithmParameterSpec *);
  virtual ::java::lang::Object *engineGetParameter (::java::lang::String *);
  virtual ::java::lang::Object *clone ();
private:
  DSASignature (::gnu::java::security::provider::DSASignature *);
  ::java::security::interfaces::DSAPublicKey * __attribute__((aligned(__alignof__( ::java::security::SignatureSpi )))) publicKey;
  ::java::security::interfaces::DSAPrivateKey *privateKey;
  ::java::security::MessageDigest *digest;
public:

  static ::java::lang::Class class$;
};

#endif /* __gnu_java_security_provider_DSASignature__ */
