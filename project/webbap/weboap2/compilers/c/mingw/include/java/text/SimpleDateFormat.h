// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_text_SimpleDateFormat__
#define __java_text_SimpleDateFormat__

#pragma interface

#include <java/text/DateFormat.h>

extern "Java"
{
  namespace java
  {
    namespace text
    {
      class SimpleDateFormat;
      class ParsePosition;
      class FieldPosition;
      class DateFormatSymbols;
    }
  }
}

class java::text::SimpleDateFormat : public ::java::text::DateFormat
{
private:
  void readObject (::java::io::ObjectInputStream *);
  void compileFormat (::java::lang::String *);
public:
  virtual ::java::lang::String *toString ();
  SimpleDateFormat ();
  SimpleDateFormat (::java::lang::String *);
  SimpleDateFormat (::java::lang::String *, ::java::util::Locale *);
  SimpleDateFormat (::java::lang::String *, ::java::text::DateFormatSymbols *);
  virtual ::java::lang::String *toPattern () { return pattern; }
  virtual ::java::lang::String *toLocalizedPattern ();
  virtual void applyPattern (::java::lang::String *);
  virtual void applyLocalizedPattern (::java::lang::String *);
private:
  ::java::lang::String *applyLocalizedPattern (::java::lang::String *, ::java::lang::String *, ::java::lang::String *);
public:
  virtual ::java::util::Date *get2DigitYearStart () { return defaultCenturyStart; }
  virtual void set2DigitYearStart (::java::util::Date *);
  virtual ::java::text::DateFormatSymbols *getDateFormatSymbols () { return formatData; }
  virtual void setDateFormatSymbols (::java::text::DateFormatSymbols *);
  virtual jboolean equals (::java::lang::Object *);
  virtual jint hashCode ();
  virtual ::java::lang::StringBuffer *format (::java::util::Date *, ::java::lang::StringBuffer *, ::java::text::FieldPosition *);
private:
  void withLeadingZeros (jint, jint, ::java::lang::StringBuffer *);
  jboolean expect (::java::lang::String *, ::java::text::ParsePosition *, jchar);
public:
  virtual ::java::util::Date *parse (::java::lang::String *, ::java::text::ParsePosition *);
private:
  void computeCenturyStart ();
  ::java::util::ArrayList * __attribute__((aligned(__alignof__( ::java::text::DateFormat )))) tokens;
  ::java::text::DateFormatSymbols *formatData;
  ::java::util::Date *defaultCenturyStart;
  jint defaultCentury;
  ::java::lang::String *pattern;
  jint serialVersionOnStream;
  static const jlong serialVersionUID = 4774881970558875024LL;
  static ::java::lang::String *standardChars;

  friend class java_text_SimpleDateFormat$FieldSizePair;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_text_SimpleDateFormat__ */
