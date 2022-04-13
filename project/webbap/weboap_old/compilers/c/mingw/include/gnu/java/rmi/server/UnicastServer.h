// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_java_rmi_server_UnicastServer__
#define __gnu_java_rmi_server_UnicastServer__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace rmi
    {
      class Remote;
    }
  }
  namespace gnu
  {
    namespace java
    {
      namespace rmi
      {
        namespace server
        {
          class UnicastServer;
          class UnicastConnection;
          class UnicastServerRef;
        }
        namespace dgc
        {
          class DGCImpl;
        }
      }
    }
  }
}

class gnu::java::rmi::server::UnicastServer : public ::java::lang::Object
{
public:
  static void exportObject (::gnu::java::rmi::server::UnicastServerRef *);
  static jboolean unexportObject (::gnu::java::rmi::server::UnicastServerRef *, jboolean);
  static ::gnu::java::rmi::server::UnicastServerRef *getExportedRef (::java::rmi::Remote *);
private:
  static void startDGC ();
public:
  static void dispatch (::gnu::java::rmi::server::UnicastConnection *);
private:
  static void incomingMessageCall (::gnu::java::rmi::server::UnicastConnection *);
public:
  UnicastServer ();
private:
  static ::java::util::Hashtable *objects;
  static ::java::util::Hashtable *refcache;
  static ::gnu::java::rmi::dgc::DGCImpl *dgc;
public:

  static ::java::lang::Class class$;
};

#endif /* __gnu_java_rmi_server_UnicastServer__ */