// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_security_auth_x500_X500Principal__
#define __javax_security_auth_x500_X500Principal__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace javax
  {
    namespace security
    {
      namespace auth
      {
        namespace x500
        {
          class X500Principal;
        }
      }
    }
  }
  namespace gnu
  {
    namespace java
    {
      namespace security
      {
        namespace x509
        {
          class X500DistinguishedName;
        }
      }
    }
  }
}

class javax::security::auth::x500::X500Principal : public ::java::lang::Object
{
public:
  X500Principal (::java::lang::String *);
  X500Principal (jbyteArray);
  X500Principal (::java::io::InputStream *);
  jboolean equals (::java::lang::Object *);
  jbyteArray getEncoded ();
  ::java::lang::String *getName ();
  ::java::lang::String *getName (::java::lang::String *);
private:
  void writeObject (::java::io::ObjectOutputStream *);
  void readObject (::java::io::ObjectInputStream *);
  static const jlong serialVersionUID = -500463348111345721LL;
public:
  static ::java::lang::String *CANONICAL;
  static ::java::lang::String *RFC1779;
  static ::java::lang::String *RFC2253;
private:
  ::gnu::java::security::x509::X500DistinguishedName * __attribute__((aligned(__alignof__( ::java::lang::Object )))) name;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_security_auth_x500_X500Principal__ */
