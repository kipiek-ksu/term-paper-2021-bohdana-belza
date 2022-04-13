// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __gnu_java_security_der_DER__
#define __gnu_java_security_der_DER__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace gnu
  {
    namespace java
    {
      namespace security
      {
        namespace der
        {
          class DER;
        }
      }
    }
  }
}

class gnu::java::security::der::DER : public ::java::lang::Object
{
public:
  static const jint UNIVERSAL = 0L;
  static const jint APPLICATION = 64L;
  static const jint CONTEXT = 128L;
  static const jint PRIVATE = 192L;
  static const jint CONSTRUCTED = 32L;
  static const jint ANY = 0L;
  static const jint BOOLEAN = 1L;
  static const jint INTEGER = 2L;
  static const jint BIT_STRING = 3L;
  static const jint OCTET_STRING = 4L;
  static const jint NULL = 5L;
  static const jint OBJECT_IDENTIFIER = 6L;
  static const jint REAL = 9L;
  static const jint ENUMERATED = 10L;
  static const jint RELATIVE_OID = 13L;
  static const jint SEQUENCE = 16L;
  static const jint SET = 17L;
  static ::java::lang::Object *CONSTRUCTED_VALUE;
  static const jint NUMERIC_STRING = 18L;
  static const jint PRINTABLE_STRING = 19L;
  static const jint T61_STRING = 20L;
  static const jint VIDEOTEX_STRING = 21L;
  static const jint IA5_STRING = 22L;
  static const jint GRAPHIC_STRING = 25L;
  static const jint ISO646_STRING = 26L;
  static const jint GENERAL_STRING = 27L;
  static const jint UTF8_STRING = 12L;
  static const jint UNIVERSAL_STRING = 28L;
  static const jint BMP_STRING = 30L;
  static const jint UTC_TIME = 23L;
  static const jint GENERALIZED_TIME = 24L;

  static ::java::lang::Class class$;
} __attribute__ ((java_interface));

#endif /* __gnu_java_security_der_DER__ */
