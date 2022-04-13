// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_sql_SQLOutput__
#define __java_sql_SQLOutput__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace net
    {
      class URL;
    }
    namespace sql
    {
      class SQLOutput;
      class Array;
      class Struct;
      class Clob;
      class Blob;
      class Ref;
      class SQLData;
      class Timestamp;
      class Time;
      class Date;
    }
    namespace math
    {
      class BigDecimal;
    }
  }
}

class java::sql::SQLOutput : public ::java::lang::Object
{
public:
  virtual void writeString (::java::lang::String *) = 0;
  virtual void writeBoolean (jboolean) = 0;
  virtual void writeByte (jbyte) = 0;
  virtual void writeShort (jshort) = 0;
  virtual void writeInt (jint) = 0;
  virtual void writeLong (jlong) = 0;
  virtual void writeFloat (jfloat) = 0;
  virtual void writeDouble (jdouble) = 0;
  virtual void writeBigDecimal (::java::math::BigDecimal *) = 0;
  virtual void writeBytes (jbyteArray) = 0;
  virtual void writeDate (::java::sql::Date *) = 0;
  virtual void writeTime (::java::sql::Time *) = 0;
  virtual void writeTimestamp (::java::sql::Timestamp *) = 0;
  virtual void writeCharacterStream (::java::io::Reader *) = 0;
  virtual void writeAsciiStream (::java::io::InputStream *) = 0;
  virtual void writeBinaryStream (::java::io::InputStream *) = 0;
  virtual void writeObject (::java::sql::SQLData *) = 0;
  virtual void writeRef (::java::sql::Ref *) = 0;
  virtual void writeBlob (::java::sql::Blob *) = 0;
  virtual void writeClob (::java::sql::Clob *) = 0;
  virtual void writeStruct (::java::sql::Struct *) = 0;
  virtual void writeArray (::java::sql::Array *) = 0;
  virtual void writeURL (::java::net::URL *) = 0;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __java_sql_SQLOutput__ */