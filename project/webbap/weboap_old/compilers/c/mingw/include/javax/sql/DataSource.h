// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_sql_DataSource__
#define __javax_sql_DataSource__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace javax
  {
    namespace sql
    {
      class DataSource;
    }
  }
  namespace java
  {
    namespace sql
    {
      class Connection;
    }
  }
}

class javax::sql::DataSource : public ::java::lang::Object
{
public:
  virtual ::java::sql::Connection *getConnection () = 0;
  virtual ::java::sql::Connection *getConnection (::java::lang::String *, ::java::lang::String *) = 0;
  virtual ::java::io::PrintWriter *getLogWriter () = 0;
  virtual void setLogWriter (::java::io::PrintWriter *) = 0;
  virtual void setLoginTimeout (jint) = 0;
  virtual jint getLoginTimeout () = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __javax_sql_DataSource__ */
