// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_javax_rmi_CORBA_PortableRemoteObjectDelegateImpl__
#define __gnu_javax_rmi_CORBA_PortableRemoteObjectDelegateImpl__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace gnu
  {
    namespace javax
    {
      namespace rmi
      {
        namespace CORBA
        {
          class PortableRemoteObjectDelegateImpl;
        }
      }
    }
  }
  namespace java
  {
    namespace rmi
    {
      class Remote;
    }
  }
}

class gnu::javax::rmi::CORBA::PortableRemoteObjectDelegateImpl : public ::java::lang::Object
{
public:
  PortableRemoteObjectDelegateImpl ();
  virtual void connect (::java::rmi::Remote *, ::java::rmi::Remote *);
  virtual void exportObject (::java::rmi::Remote *);
  virtual ::java::lang::Object *narrow (::java::lang::Object *, ::java::lang::Class *);
  virtual ::java::rmi::Remote *toStub (::java::rmi::Remote *);
  virtual void unexportObject (::java::rmi::Remote *);

  static ::java::lang::Class class$;
};

#endif /* __gnu_javax_rmi_CORBA_PortableRemoteObjectDelegateImpl__ */